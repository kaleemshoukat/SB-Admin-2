<?php

namespace App\Http\Controllers;

use ccxt\binance;
use ccxt\Exchange;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public $binance;

    public function __construct(){
        $this->binance = new binance(array(
            'apiKey' => env('EXCHANGE_PUBLIC_API_KEY'),
            'secret' => env('EXCHANGE_SECRET_PRIVATE_KEY'),
        ));
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function exchanges(){
        return Exchange::$exchanges;
    }

    public function loadMarkets(){
        $binance_markets = $this->binance->load_markets();
        dd($binance_markets);
    }

    public function fetchBalance(){
        $binance_balance = $this->binance->fetch_balance();
        dd($binance_balance);
    }

    public function fetchTicker(){
        $binance_ticker = $this->binance->fetch_ticker('ETH/EUR');
        dd($binance_ticker);
    }

    public function fetchTrades(){
        $binance_trades = $this->binance->fetch_trades('BTC/USD');
        dd($binance_trades);
    }

    public function fetchOrderBook(){
        $binance_order_book = $this->binance->fetch_order_book($this->binance->symbols[0]);
        dd($binance_order_book);
    }

    public function createMarketSellOrder(){
        // sell 1 BTC/JPY for market price, you pay ¥ and receive ฿ immediately
        dd($this->binance->id, $this->binance->create_market_sell_order('BTC/JPY', 1));
    }

    public function createLimitBuyOrder(){
        // buy BTC/JPY, you receive ฿1 for ¥285000 when the order closes
        dd($this->binance->id, $this->binance->create_limit_buy_order('BTC/JPY', 1, 285000));
    }

    public function createOrder(){
        // set a custom user-defined id to your order
        $this->binance->create_order('BTC/USD', 'limit', 'buy', 1, 3000, array ('clientOrderId' => '123'));
    }



}
