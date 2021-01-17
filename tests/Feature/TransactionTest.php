<?php

namespace Tests\Feature;

use App\Client;
use App\Transaction;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;

    // Index
    public function testUnauthorizedUserCantSeeTransactionIndex()
    {
        $response = $this->get('transactions');

        $response->assertRedirect('login');
    }

    public function testAuthorizedUserCanSeeTransactionList()
    {
        $this->signIn();

        $response = $this->get('transactions');

        $response->assertSuccessful();
    }

    // Create
    public function testUnauthorizedUserCantCreateATransaction()
    {
        $response = $this->get('transactions/create');

        $response->assertRedirect('login');
    }

    public function testAuthorizedUserCanCreateATransaction()
    {
        $this->signIn();

        $response = $this->get('transactions/create');

        $response->assertSuccessful();
    }

    public function testUserCanCreatATransaction()
    {
        $transaction = make(Transaction::class)->toArray();

        $response = $this->json('post', 'api/transactions', $transaction);

        $this->assertEquals('"Transaction successfully created."', $response->getContent());

        $response->assertSuccessful();
    }

    public function testCantCreateTransactionWithoutValidData()
    {
        $transaction = [];

        $response = $this->json('post', 'api/transactions', $transaction);

        $response->assertStatus(422);
    }

    // Update
    public function testUnauthorizedUserCantEditATransaction()
    {
        $transaction = create(Transaction::class);

        $response = $this->get("transactions/{$transaction->id}/edit");

        $response->assertRedirect('login');
    }

    public function testAuthorizedUserCanEditATransaction()
    {
        $this->signIn();

        $transaction = create(Transaction::class);

        $response = $response = $this->get("transactions/{$transaction->id}/edit");

        $response->assertSuccessful();
    }

    public function testUserCanUpdateATransaction()
    {
        $transaction = create(Transaction::class)->toArray();

        $transaction['client_id'] = create(Client::class)->id;

        $response = $this->json('put', "api/transactions/{$transaction['id']}", $transaction);

        $this->assertEquals('"Transaction successfully updated."', $response->getContent());

        $response->assertSuccessful();
    }

    // Destroy
    public function testUserCanDeleteTransaction()
    {
        $transaction = create(Transaction::class);

        $response = $this->json('delete', "api/transactions/{$transaction->id}");

        $response->assertSuccessful();

        $this->assertDatabaseMissing('transactions', ['id' => $transaction->id]);
    }
}
