<?php

namespace App\Units\Transfer\Http\Controllers;

use App\Domains\Transfers\TransferRepository;
use App\Domains\Users\UserRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    protected $transferRepository;
    protected $userRepository;

    public function __construct(TransferRepository $gr, UserRepository $ur)
    {
        parent::__construct();
        $this->transferRepository = $gr;
        $this->userRepository = $ur;
    }

    public function index($type = 0, $date = '')
    {
        $transfers = $this->transferRepository->getTransfers($type, $date);
        $view = (\Auth::user()->profile == 'admin') ? 'transfer::index' : 'transfer::user';
        return view($view, compact('transfers', 'type'));
    }

    public function request()
    {
        $input['user_id'] = \Auth::user()->id;
        $input['balance'] = \Auth::user()->balance;
        $input['done'] = 0;
        $this->transferRepository->create($input);
        $this->userRepository->update(['balance' => 0.00], \Auth::user()->id);

        return redirect()->route('user.index');
    }

    public function update($transfer, $tp)
    {
        $this->transferRepository->update(['done' => $tp], $transfer);

        return redirect()->route('transfer.index');
    }
}