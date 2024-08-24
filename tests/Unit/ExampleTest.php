<?php

namespace Tests\Unit\Models;

use App\Models\DpmFikes;
use App\Models\HasilVotingFikes;
use App\Models\HasilVotingFk;
use App\Models\PresmaFikes;
use App\Models\User;
use App\Models\DpmFK;
use App\Models\PresmaFK;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testVotingFK()
    {
        $user = User::factory()->create();

        $dpm = DpmFK::factory()->create();

        $presma = PresmaFK::factory()->create();

        $hasilVoting = HasilVotingFk::create([
            'users_id' => $user->id,
            'dpm_id' => $dpm->id,
            'presma_id' => $presma->id,
        ]);

        $this->assertDatabaseHas('hasil_voting_fk', [
            'id' => $hasilVoting->id,
            'users_id' => $user->id,
            'dpm_id' => $dpm->id,
            'presma_id' => $presma->id,
        ]);
    }

    public function testVotingFikes()
    {
        $user = User::factory()->create();

        $dpm = DpmFikes::factory()->create();

        $presma = PresmaFikes::factory()->create();

        $hasilVoting = HasilVotingFikes::create([
            'users_id' => $user->id,
            'dpm_id' => $dpm->id,
            'presma_id' => $presma->id,
        ]);

        $this->assertDatabaseHas('hasil_voting_fikes', [
            'id' => $hasilVoting->id,
            'users_id' => $user->id,
            'dpm_id' => $dpm->id,
            'presma_id' => $presma->id,
        ]);
    }

    public function testUserCanVoteOnceForPresmaAndDpm()
    {
        // Membuat data user
        $user = User::factory()->create();
        $presma = PresmaFK::factory()->create();
        $presmaId = $presma->id;

        // Membuat data DpmFK dan mendapatkan ID dpm yang valid
        $dpm = DpmFK::factory()->create();
        $dpmId = $dpm->id;

        // Membuat data HasilVotingFk presma sebelumnya untuk user
        HasilVotingFk::factory()
        ->create([
            'users_id' => $user->id,
            'presma_id' => $presmaId,
            'dpm_id' => $dpmId
        ]);

        // Membuat data HasilVotingFk dpm sebelumnya untuk user
        HasilVotingFk::factory()
        ->create([
            'users_id' => $user->id,
            'dpm_id' => $dpmId  ,
            'presma_id' => $presmaId
        ]);

        // Memanggil method storeVoting untuk presma dengan ID presma yang sudah ada
        $responsePresma = $this->post(route('storeVoting', ['id' => $presmaId]));

        // Memanggil method storeVoting untuk dpm dengan ID dpm yang sudah ada
        $responseDpm = $this->post(route('storeVoting', ['id' => $presmaId]));

        // Memastikan bahwa respon untuk storeVoting presma mengembalikan status 422 Unprocessable Entity
        $responsePresma->assertStatus(302);

        // Memastikan bahwa respon untuk storeVoting dpm mengembalikan status 422 Unprocessable Entity
        $responseDpm->assertStatus(302);
    }

}
