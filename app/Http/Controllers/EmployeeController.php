<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\DueList;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SalaryPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Employee::STATUS;
        $employe = Employee::orderBy('id','desc')->get();
        return view("employees.list",compact('employe','status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = Employee::STATUS;
        return view("employees.add",compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'salary' => 'required',
            // 'address' => 'required',
        ]);
        $image = '';
        if($images = $request->file('image')){
            $image = time().'.'.$images->getClientOriginalExtension();
            $images->move(public_path('uploads/employe'), $image);
        }
        $employe = new Employee();
        $employe->name = $request->name;
        $employe->phone = $request->phone;
        $employe->email = $request->email;
        $employe->salary = $request->salary;
        $employe->status = $request->status;
        $employe->due_salary = $request->due_salary;
        $employe->addvance_salary = $request->addvance_salary;
        $employe->joining_date = $request->joining_date;
        $employe->address = $request->address;
        $employe->image = $image;
        $employe->save();
        // dd($employe->id);
        if($request->due_salary){
            $salary = new SalaryPayment();
            $salary->user_id = auth()->user()->id;
            $salary->employe_id = $employe->id;
            $salary->payment = $request->due_salary;
            $salary->status = 1;
            $salary->comment = "Initial Due Salary Payment";
            $salary->save();

        }
        if($request->addvance_salary){
            $salary = new SalaryPayment();
            $salary->user_id = auth()->user()->id;
            $salary->employe_id = $employe->id;
            $salary->payment = $request->addvance_salary;
            $salary->status = 2;
            $salary->comment = "Initial Addvance Salary Payment";
            $salary->save();
        }
        return redirect()->route('admin.employe.index')->with('success',"Employe Added Successfully.");
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function show(Request $request,$id){
        $data['employee'] = Employee::find($id);
        $data['salary'] = Salary::where('employee_id',$id)->get();
        $data['dueList'] = SalaryPayment::where('employe_id',$id)->where('status',1)->get();
        $data['advanceList'] = SalaryPayment::where('employe_id',$id)->where('status',2)->get();
        $data['duePayment'] = SalaryPayment::where('employe_id',$id)->where('status',3)->get();
        $data['advancePayment'] = SalaryPayment::where('employe_id',$id)->where('status',4)->get();
        return view('employees.employee_details',$data);

    }
    public function edit($id)
    {
        $employe = Employee::find($id);
        // $openingDue = DueList::where([['party_id',$employe->id],['status',1]])->first();
        // dd( $openingDue);
        $status = Employee::STATUS;
        return view("employees.edit",compact("employe",'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

// dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'salary' => 'required',
            // 'address' => 'required',
        ]);
        $employe = Employee::find($id);
        $logo = $employe->image;
        if($image = $request->file('image')){
            $path = public_path('uploads/employe/'.$employe->image);
            if(File::exists($path)){
                File::delete($path);
            }
            $logo = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/employe'), $logo);
            $employe->image = $logo;
        }
        // dd(auth()->user()->id);

        if($request->due_salary != $employe->due_salary){
            $salary =  SalaryPayment::where([['employe_id',$employe->id],['status',1]])->first();
            // dd($salary);
            if(!$salary){
                $salary = new SalaryPayment();
                $salary->status = 1;
                $salary->employe_id = $id;
            }
            $salary->user_id = auth()->user()->id;
            $salary->payment = $request->due_salary;
            $salary->comment = "Update Due Salary Payment";
            $salary->save();

        }
        if($request->addvance_salary != $employe->addvance_salary){
            $salary =  SalaryPayment::where([['employe_id',$employe->id],['status',2]])->first();
            if(!$salary){
                $salary = new SalaryPayment();
                $salary->status = 2;
                $salary->employe_id = $id;
            }
            $salary->user_id = auth()->user()->id;
            $salary->payment = $request->addvance_salary;
            $salary->comment = "Update Addvance Salary Payment";
            $salary->save();
        }


        $employe->name = $request->name;
        $employe->phone = $request->phone;
        $employe->email = $request->email;
        $employe->salary = $request->salary;
        $employe->due_salary = $request->due_salary;
        $employe->addvance_salary = $request->addvance_salary;
        $employe->joining_date = $request->joining_date;
        $employe->address = $request->address;
        $employe->image = $logo;
        $employe->status = $request->status;
        $employe->save();
        return redirect()->route('admin.employe.index')->with('success',"Employe Information Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function employeSalaryList($id=null)
    {
        $employee = Employee::where("status",'!=',0)->get();
        if($id){
            $salary = Salary::with('employe')->where('employee_id',$id)->orderBy('id','desc')->get();
        }else{
            $salary = Salary::with('employe')->orderBy('id','desc')->get();
        }
        // dd($salary);
        return view('employees.salary_list',compact('salary','employee'));
    }
    public function employe_salary(Request $request, $id)
    {

        $salaryPayment = new SalaryPayment();
        $salaryPayment->user_id = auth()->user()->id;
        $salaryPayment->employe_id = $request->employe_id;
        $salaryPayment->payment = $request->amount;
        $salaryPayment->status = $request->status;
        $salaryPayment->salary = $request->salary;
        $salaryPayment->work_day = $request->work_day;
        $salaryPayment->addvance_salary = $request->addvance_salary;
        $salaryPayment->daily_salary = $request->daily_salary;
        $salaryPayment->comment = $request->comment;
        $salaryPayment->save();
        session()->flash('success','Employe Due Salary Payment Successful.');
        return redirect()->route('admin.employeSalaryList',$id);
    }
    public function addvance_salary(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'amount'=>'required',
            'status'=>'required',
            'employe_id'=>'required',
        ]);
        $employe = Employee::find($id);
        if($request->status == 3 && $employe->due_salary <= 0){
            return redirect()->back();
        }
        if($request->status == 3){
            $employe->due_salary -= $request->amount;
        }elseif($request->status == 2){
            $employe->addvance_salary += $request->amount;
        }
        $employe->save();

        $salaryPayment = new SalaryPayment();
        $salaryPayment->user_id = auth()->user()->id;
        $salaryPayment->employe_id = $request->employe_id;
        $salaryPayment->payment = $request->amount;
        $salaryPayment->status = $request->status;
        $salaryPayment->comment = $request->comment;
        $salaryPayment->save();
        $status = $request->status == 3? "Due":"Advance";
        session()->flash('success',"Employe $status Salary Payment Successful.");
        session()->flash('status',$status);
        return redirect()->route('admin.employe.show',$id);
    }
    public function salary_report(Request $request)
    {
        $date = explode(' to ',$request->from);
        $from = $date[0];
        $to = $date[1]??'';
        // dd($from,$to);
        $employe = $request->employee_id;
        $condition = [];
        if($from){
            if($to){
                array_push($condition,['salary_date','>=',$from]);
            }else{
                array_push($condition,['salary_date','=',$from]);
            }
        }
        if($to){
            array_push($condition,['salary_date','<=',$to]);
        }
        if($employe){
            array_push($condition,['employee_id','=',$employe]);
        }
        $salary = Salary::where($condition)->get();
        $employee = Employee::where("status",'!=',0)->get();
        return view('employees.salary_list',compact('salary','employee'));
    }
}
