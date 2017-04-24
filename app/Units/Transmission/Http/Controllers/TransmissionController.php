<?php

namespace App\Units\Transmission\Http\Controllers;

use App\Domains\Transmissions\TransmissionRepository;
use App\Domains\Users\UserRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    protected $transmissionRepository;

    public function __construct(TransmissionRepository $tr)
    {
        parent::__construct();
        $this->transmissionRepository = $tr;
    }

    public function index($type = 0, $date = '')
    {
        $date = $date ?: date('Y-m-d');
        $transmissions = $this->transmissionRepository->orderBy('id', 'desc')->paginate();
        return view('transmission::index', compact('transmissions','date'));
    }

    public function create()
    {
        return view('transmission::create');
    }

    public function user()
    {
        $transmissions = $this->transmissionRepository->findWhere(['live' => 1]);
        return view('transmission::user', compact('transmissions'));
    }

    public function hide($id)
    {
        $this->transmissionRepository->update(['live' => 0], $id);

        return redirect()->route('transmission.index');
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $this->transmissionRepository->create($input);

        return redirect()->route('transmission.index');
    }

    public function update($bonus, $user)
    {
        $user = $this->userRepository->find($user);
        $this->bonusRepository->update(['done' => 1], $bonus);
        $balance = $user->balance + 5.00;
        $this->userRepository->update(['balance' => $balance], $user->id);

        return redirect()->route('bonus.index');
    }
}