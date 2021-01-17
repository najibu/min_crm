<?php

namespace Tests\Feature;

use App\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use DatabaseMigrations;

    // Index
    public function testUnauthorizedUserCantSeeClientIndex()
    {
        $response = $this->get('clients');

        $response->assertRedirect('login');
    }

    public function testAuthorizedUserCanSeeClientList()
    {
        $this->signIn();

        $response = $this->get('clients');

        $response->assertSuccessful();
    }

    // Create
    public function testUnauthorizedUserCantCreateAClient()
    {
        $response = $this->get('clients/create');

        $response->assertRedirect('login');
    }

    public function testAuthorizedUserCanCreateAClient()
    {
        $this->signIn();

        $response = $this->get('clients/create');

        $response->assertSuccessful();
    }

    public function testUserCanCreateAClient()
    {
        $client = make(Client::class)->toArray();

        $avatar = UploadedFile::fake()->image('avatar.png', 100, 100);
        $client['avatar'] = $avatar;

        $response = $this->json('post', 'api/clients', $client);

        $this->assertEquals('"Client successfully created."', $response->getContent());

        $response->assertSuccessful();
    }

    public function testAValidAvatarMustBeProvided()
    {
        $client = make(Client::class)->toArray();

        $response = $this->json('post', 'api/clients', $client);

        $response->assertStatus(422);
    }

    public function testCantCreateAClientWithoutValidData()
    {
        $client = [];

        $response = $this->json('post', 'api/clients', $client);

        $response->assertStatus(422);
    }

    // Update
    public function testUnauthorizedUserCantEditAClient()
    {
        $client = create(Client::class);

        $response = $this->get("clients/{$client->id}/edit");

        $response->assertRedirect('login');
    }

    public function testAuthorizedUserCanEditAClient()
    {
        $this->signIn();

        $client = create(Client::class);

        $response = $response = $this->get("clients/{$client->id}/edit");

        $response->assertSuccessful();
    }

    public function testUserCanUpdateAClient()
    {
        $client = create(Client::class)->toArray();

        $client['first_name'] = 'Najibu';

        $response = $this->json('put', "api/clients/{$client['id']}", $client);

        $this->assertEquals('"Client successfully updated."', $response->getContent());

        $response->assertSuccessful();
    }

    // Destroy
    public function testUserCanDeleteAClient()
    {
        $client = create(Client::class);

        $response = $this->json('delete', "api/clients/{$client->id}");

        $response->assertSuccessful();

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
