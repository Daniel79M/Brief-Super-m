<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Interfaces\MemberInterface;
use App\Models\member;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class MemberController extends Controller
{

    private MemberInterface $memberInterface;

    public function __construct(MemberInterface $memberInterface)
    {
        $this->memberInterface = $memberInterface;
    }

    public function index(){
        try {
            $member = $this->memberInterface->index();
            return ApiResponse::sendResponse(
                true, 
                $member,
                'Opération effectuée.',
                201
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::rollback($th);
        }
        
    }

    public function create(){

    }

    public function store( MemberRequest $request ){
        
        $data = [
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'sexe' => $request->sexe,
            'dateEntrer' => $request->dateEntrer,
            'contact' => $request->contact,
            'age' => $request->age,
            'voix' => $request->voix
        ];

        DB::beginTransaction();
        try {
            $member = $this->memberInterface->store($data);

            DB::commit();

            return ApiResponse::sendResponse(
                true, 
                $member, 
                'Opération effectuée.', 
                201
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::rollback($th);
        }
    }
}
