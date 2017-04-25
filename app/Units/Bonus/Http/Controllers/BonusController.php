<?php

namespace App\Units\Bonus\Http\Controllers;

use App\Domains\Bonus\BonusRepository;
use App\Domains\Users\UserRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    protected $bonusRepository;
    protected $userRepository;

    public function __construct(BonusRepository $gr, UserRepository $ur)
    {
        parent::__construct();
        $this->bonusRepository = $gr;
        $this->userRepository = $ur;
    }

    public function index($type = 0, $date = '')
    {
        $date = $date ?: date('Y-m-d');
        $bonus = $this->bonusRepository->getBonus($type, $date);
        return view('bonus::index', compact('bonus', 'type', 'date'));
    }

    public function check($date)
    {
        $this->bonusRepository->check($date);

        return redirect()->route('bonus.index');
    }

    public function brequest(Request $request)
    {
        $tp = ($request->get('type') == 'insta') ? $request->get('val') : 1;
        $this->userRepository->update([$request->get('type') => $tp], \Auth::user()->id);
        $arr = [
          'user_id' => \Auth::user()->id,
          'match_id' => $request->get('match_id'),
          'type' => $request->get('type'),
          'done' => 0
        ];
        $this->bonusRepository->create($arr);

        return "OK";
    }

    public function update($bonus, $user)
    {
        $user = $this->userRepository->find($user);
        $b = $this->bonusRepository->find($bonus);
        $this->bonusRepository->update(['done' => 1], $bonus);
        if ($b->value == 10 OR $b->value == 20) {
            $balance = $user->balance + $b->value;
            $this->userRepository->update(['balance' => $balance], $user->id);
        }

        return redirect()->route('bonus.index');
    }
}