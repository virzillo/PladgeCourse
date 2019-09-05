<?php

use App\Card;
use App\Token;
use Illuminate\Database\Seeder;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = new  Token();
        $token->nome = 'Ei-Token EIPASS Unica';
        $token->save();

        $token = new  Token();
        $token->nome = 'Eipass Corsi on-line';
        $token->save();

        $token = new  Token();
        $token->nome = 'UPGRADE';
        $token->save();

        $token = new  Token();
        $token->nome = 'PEKIT';
        $token->save();

        $token = new  Token();
        $token->nome = 'Inglese Token A1';
        $token->save();

        $token = new  Token();
        $token->nome = 'Inglese Token A2';
        $token->save();

        $token = new  Token();
        $token->nome = 'Inglese Token B1';
        $token->save();

        $token = new  Token();
        $token->nome = 'Inglese Token B2';
        $token->save();

        $token = new  Token();
        $token->nome = 'Inglese Token C1';
        $token->save();

        $token = new  Token();
        $token->nome = 'Inglese Token C2';
        $token->save();


        $card = new  Card();
        $card->nome = 'Ei-Token EIPASS Unica';
        $card->save();

        $card = new  Card();
        $card->nome = 'Eipass Corsi on-line';
        $card->save();

        $card = new  Card();
        $card->nome = 'UPGRADE';
        $card->save();

        $card = new  Card();
        $card->nome = 'PEKIT';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token A1';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token A2';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token B1';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token B2';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token C1';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token C2';
        $card->save();
    }
}
