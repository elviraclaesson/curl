<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Customer;
use App\CustomerAddress;
class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers {url}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get customer data from url';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');
        $this->info('Initializing curl...');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $this->info('Sending request to: ' . $url);
        $response = json_decode(curl_exec($curl), true);
        foreach ($response as $item) {
            $this->info("Updating customer: ".$value['id']);
            $customer = Customer::find($value['id']);
            if ($customer == null)
                $customer = new Customer();
            $customer->fill($item);
            $customer->save();
            if (!isset($item['address']) || !is_array($item['address'])) continue;
            $customer_address = CustomerAddress::find($item['address']['id']);
            if ($customer_address == null)
                $customer_address = new CustomerAddress();
            $customer_address->fill($item['address']);
            $customer_address->save();
        }
        $this->info("Customers imported!");
    }
}

