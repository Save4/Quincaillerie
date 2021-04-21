<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sortie;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $transactions = Transaction::all();
        $clients = Client::all();
        $sorties = Sortie::all();
        return view(
            'transactions.index',
            [
                'products' => $products,
                'transactions' => $transactions,
                'clients' => $clients,
                'sorties' => $sorties
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            //client Modal
            $clients = new Client;
            $clients->name = $request->customer_name;
            $clients->phone = $request->customer_phone;
            $clients->save();
            $client_id = $clients->id;
            //sorties Modal
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $sorties = new Sortie;
                $sorties->client_id = $client_id;
                $sorties->product_id = $request->product_id[$product_id];
                $sorties->unitprice = $request->unitprice[$product_id];
                $sorties->quantity = $request->quantity[$product_id];
                $sorties->discount = $request->discount[$product_id];
                $sorties->amount = $request->amount[$product_id];
                $sorties->save();
            }

            //Transaction Modal
            $transaction = new Transaction();
            $transaction->client_id = $client_id;
            $transaction->user_id = auth()->user()->id;
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->transact_amount = $sorties->amount;
            $transaction->transact_date = date('y-m-d');
            $transaction->save();


            //Last client history
            $products = Product::all();
            $sorties = Sortie::where('client_id', $client_id)->get();
            $orderedby = Client::where('id', $client_id)->get();

            return view(
                'transactions.index',
                [
                    'products' => $products,
                    'sorties' => $sorties,
                    'customer_orders' => $orderedby

                ]
            );
        });
        return "Product transactions fails to inserted! check your inputs!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
