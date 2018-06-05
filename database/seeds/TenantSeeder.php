<?php

use Illuminate\Database\Seeder;

use App\Models\Tenant;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::init(
            config('hellohi.API_URL') . "/oauth/token",
            config('hellohi.API_URL'),
            config('hellohi.API_OAUTH_CLIENT_ID'),
            config('hellohi.API_OAUTH_SECRET'),
            config('hellohi.API_USERNAME'),
            config('hellohi.API_PASSWORD'),
            config('hellohi.API_TENANT_ID')
        );

        $response = Model::all('tenants', ['creator']);

        foreach($response as $tenant) {
            // $tenant = Tenant::create(
            //     ['name' => $tenant->name]
            // );  
        }
    }
}
