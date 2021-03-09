<?php

namespace App\Http\Controllers;

use App\Http\Resources\Audit as AuditResource;
use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$params = $request->query->all();
        $from = $request->query->get('dateFrom');
        $till = $request->query->get('dateTill');

        if ($from && $till) {
            $audits = Audit::where('updated_at', '>=', $from, '&&', '<=', $till)->paginate(15);
        } else if ($from) {
            $audits = Audit::where('updated_at', '>=', $from)->paginate(15);
        } else if ($till) {
            $audits = Audit::where('updated_at', '<=', $till)->paginate(15);
        } else {
            $audits = Audit::all();
        }

        return $audits;
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
    public function show($id)
    {

        $audit = Audit::findOrFail($id);

        //return the single article as a resource
        return new AuditResource($audit);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audit = Audit::findOrFail($id);

        if($audit->delete()) {
            return new AuditResource($audit);
        }
    }
}
