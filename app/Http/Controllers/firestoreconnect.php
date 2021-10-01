<?php

namespace App\Http\Controllers;

use Facade\Ignition\Http\Controllers\ScriptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Kreait\Firebase\Firestore;

class firestoreconnect extends Controller
{
    protected $auth, $database, $fac;



    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(__DIR__.'\keySimuladorSEAC.json')
            ->withDatabaseUri('https://simuladorseac.firebaseio.com/');

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
        $this->fac = $factory;
    }


    public function checarUsuario(Request $request){
        if($request->session()->has('firebaseUserId')){
            return true;
        }else{
            return false;
        }
    }

    public function signUp()
    {
        $email = "iderlisouzaa@gmail.com";
        $pass = "123456";

        try {
            $newUser = $this->auth->createUserWithEmailAndPassword($email, $pass);
            dd($newUser);
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'The email address is already in use by another account.':
                    dd("Email sudah digunakan.");
                    break;
                case 'A password must be a string with at least 6 characters.':
                    dd("Kata sandi minimal 6 karakter.");
                    break;
                default:
                    dd($e->getMessage());
                    break;
            }
        }
    }

    public function signIn(Request $req)
    {
        $email =  $req->emaillogin;
        $pass = $req->senhalogin;


        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);
            $req->session()->start();

            $req->session()->put('firebaseUserId', $signInResult->firebaseUserId());
            $req->session()->put('idToken', $signInResult->idToken());



            //   Session::start();

         //  Session::put('firebaseUserId', $signInResult->firebaseUserId());
          // Session::put('idToken', $signInResult->idToken());

        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return 'INVALID_PASSWORD';
                    break;
                case 'EMAIL_NOT_FOUND':
                    return 'EMAIL_NOT_FOUND';
                    break;
                default:
                    return 'ERRO';
                    //dd($e->getMessage());

                    break;
            }
        }


        return 'True';

    }

    public function signOut(Request $request)
    {
        if ($request->session()->has('firebaseUserId') && $request->session()->has('idToken')) {
            // dd("User masih login.");
            $this->auth->revokeRefreshTokens($request->session()->get('firebaseUserId'));
            $request->session()->forget('firebaseUserId');
            $request->session()->forget('idToken');
            $request->session()->save();
        }
    }



    public function read()
    {
        $ref = $this->database->getReference('hewan/herbivora/domba')->getSnapshot();
        dump($ref);
        $ref = $this->database->getReference('hewan/herbivora')->getValue();
        dump($ref);
        $ref = $this->database->getReference('hewan/karnivora')->getValue();
        dump($ref);
        $ref = $this->database->getReference('hewan/omnivora')->getSnapshot()->exists();
        dump($ref);
    }

    public function update()
    {
        // before
        $ref = $this->database->getReference('tumbuhan/dikotil')->getValue();
        dump($ref);

        // update data
        $ref = $this->database->getReference('tumbuhan')
            ->update(["dikotil" => "mangga"]);

        // after
        $ref = $this->database->getReference('tumbuhan/dikotil')->getValue();
        dump($ref);
    }

    public function set()
    {
        // before
        $ref = $this->database->getReference('hewan')->getValue();
        dump($ref);

        // set data
        $ref = $this->database->getReference('hewan/karnivora')
            ->set([
                "harimau" => [
                    "benggala" => "galak",
                    "sumatera" => "jinak"
                ]
            ]);

        // after
        $ref = $this->database->getReference('hewan')->getValue();
        dump($ref);
    }

    public function delete()
    {
        // before
        $ref = $this->database->getReference('hewan/karnivora/harimau')->getValue();
        dump($ref);

        /**
         * 1. remove()
         * 2. set(null)
         * 3. update(["key" => null])
         */

        // remove()
        $ref = $this->database->getReference('hewan/karnivora/harimau/benggala')->remove();

        // set(null)
        $ref = $this->database->getReference('hewan/karnivora/harimau/benggala')
            ->set(null);

        // update(["key" => null])
        $ref = $this->database->getReference('hewan/karnivora/harimau')
            ->update(["benggala" => null]);

        // after
        $ref = $this->database->getReference('hewan/karnivora/harimau')->getValue();
        dump($ref);
    }

}
