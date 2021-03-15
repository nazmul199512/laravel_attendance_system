<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

/**
 * Class showEmployeeController
 * @package App\Http\Controllers
 * @author MD. Nazmul Alam <nazmul199512@gmail.com>
 */
class showEmployeeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employee = Employee::all();
        return view('admin', ['employee'=>$employee]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function ban_employee($id)
    {
        $employee = Employee::find($id);
        $employee->is_employee=1;
        $employee->save();

        return redirect('/admin');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function permit_employee($id)
    {
        $employee = Employee::find($id);
        $employee->is_employee=0;
        $employee->save();

        return redirect('/admin');
    }
}
