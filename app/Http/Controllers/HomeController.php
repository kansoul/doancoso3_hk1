<?php

namespace App\Http\Controllers;
use App\dssv;
use App\dslop;
use App\giaovien;
use App\monhoc;
use App\thoikhoabieu;
use App\diemdanh;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function trangadmin()
    {
    	return view('trangadmin.admin');	
    }
    
    public function trangdssv(Request $req, $id)
    {
        $sinhvien = DB::table('dssv as n')
        ->where('idlop',$req->id)
        ->join('dslop as sp', 'n.idlop', '=', 'sp.id')
        ->select('n.*','sp.name','sp.khoa')
        ->paginate(10);
       // dd($sinhvien);
        $dslop =DB::table('dslop as ds')
        ->where('id', $req->id)
        ->select('ds.*')
        ->paginate(10);
        //dd($dslop);
        return view('trangadmin.dssv')->with([
            'sinhvien'=>$sinhvien,
            'dslop'=>$dslop

        ]);
    }

    public function addsinhvien(Request $request){

        dssv::create([
            'ten' => $request['ten'],
            'masv'=>$request['masv'] ,
            'idlop' =>$request['idlop'] 
        ]);
        $idlop=$request['idlop']; 
        
        return redirect()->route('dssv', ['id' => $idlop])->with('status','Thêm thành công');
       // return redirect()->route('profile', ['id' => 1]);

    }

    public function updatesinhvien(Request $request ,$id)
    {
        $sinhvien = dssv::find($id);
        $sinhvien ->ten = $request->input('ten');
        $sinhvien ->masv = $request->input('masv');
        $sinhvien ->idlop = $request->input('idlop');
        $sinhvien ->update();

        return redirect()->route('dssv', ['id' => $request->input('idlop')])->with('status','Cập nhật thành công');
    }

    public function deletesinhvien(Request $request,$id)
    {
        $sinhvien =dssv::findOrFail($id);
        $idlop=$sinhvien->idlop;
        $sinhvien->delete();
       
        return redirect()->route('dssv', ['id' => $idlop])->with('status','Xóa thành công');
    }

    //dslop
    public function trangdslop()
    {
        $lop = dslop::all();
        $lop= dslop::paginate(10);

        return view('trangadmin.dslop')->with('lop',$lop);
    }

    public function addlop(Request $request){

        dslop::create([
            'name' => $request['name'],
            'khoa'=>$request['khoa'] ,
           
        ]);
        return redirect()->route('dslop')->with('status','Thêm thành công');
    }

    public function updatelop(Request $request ,$id)
    {
        $lop = dslop::find($id);
        $lop ->name = $request->input('name');
        $lop ->khoa = $request->input('khoa');
        
        $lop ->update();

        return redirect()->route('dslop')->with('status','Cập nhật thành công');
    }

    public function deletelop(Request $request,$id)
    {
        $lop =dslop::findOrFail($id);
        $lop->delete();
        return redirect()->route('dslop')->with('status','Xóa thành công');
    }

    //dsgv
    public function trangdsgv()
    {
        $gv = giaovien::all();
        $gv= giaovien::paginate(10);

        return view('trangadmin.giaovien')->with('gv',$gv);
    }

    public function addgv(Request $request){
        //$user = DB::table('giaovien')->where('email', $request['email'])->first();
        if (DB::table('giaovien')->where('email', $request['email'])->doesntExist()) {
            giaovien::firstOrCreate([
                'name' => $request['name'],
                'email'=>$request['email'] ,
                'password'=>$request['password'] ,
                'chucvu'=>$request['chucvu'] ,
               
            ]);
    
            return redirect()->route('dsgv')->with('status1','Thêm thành công');
        }
        else return redirect()->route('dsgv')->with('status2','Email đã tồn tại');
        
    }

    public function updategv(Request $request ,$id)
    {
        if (DB::table('giaovien')->where('email', $request['email'])->exists()) {
            $gv = giaovien::find($id);
            $gv ->name = $request->input('name');
        
            $gv ->password = $request->input('password');
            $gv ->chucvu = $request->input('chucvu');
            $gv ->update();

        return redirect()->route('dsgv')->with('status1','Cập nhật thành công');
        }
        else {
            $gv = giaovien::find($id);
            $gv ->name = $request->input('name');
            $gv ->email = $request->input('email');
            $gv ->password = $request->input('password');
            $gv ->chucvu = $request->input('chucvu');
            $gv ->update();
         return redirect()->route('dsgv')->with('status1','Cập nhật thành công');
        }
    }

    public function deletegv(Request $request,$id)
    {
        $gv =giaovien::findOrFail($id);
        $gv->delete();
        return redirect()->route('dsgv')->with('status','Xóa thành công');
    }
//dsmonhoc
    public function trangmonhoc()
    {
        $monhoc = DB::table('monhoc as n')
        ->join('giaovien as sp', 'n.giaovien', '=', 'sp.id')
        ->select('n.*','sp.name')
        ->paginate(10);
//dd($monhoc);
        $giaovien = giaovien::all();
      
        return view('trangadmin.monhoc')->with([

            'monhoc'=>$monhoc,
            'giaovien'=>$giaovien
        ]);
    }

    public function addmonhoc(Request $request){

        monhoc::create([
            'ten' => $request['ten'],
            'giaovien'=>$request['giaovien'] ,
           
        ]);
        return redirect()->route('monhoc')->with('status','Thêm thành công');
    }

    public function updatemonhoc(Request $request ,$id)
    {
        $monhoc = monhoc::find($id);
        $monhoc ->ten = $request->input('ten');
        $monhoc ->giaovien = $request->input('giaovien');
        
        $monhoc ->update();

        return redirect()->route('monhoc')->with('status','Cập nhật thành công');
    }

    public function deletemonhoc(Request $request,$id)
    {
        $monhoc =monhoc::findOrFail($id);
        $monhoc->delete();
        return redirect()->route('monhoc')->with('status','Xóa thành công');
    }
//thoikhoabieu
    public function trangthoikhoabieu()
    {

        $dslop=dslop::all();
        $dslop=dslop::paginate(10);
        

        return view('trangadmin.thoikhoabieu')->with([
            
            'dslop'=>$dslop
        
        ]);
    }

    public function chitietthoikhoabieu(Request $req, $id)
    {
        $thoikhoabieu = DB::table('thoikhoabieu as n')
        ->where('idlop',$req->id)
        ->join('dslop as sp', 'n.idlop', '=', 'sp.id')
        ->join('monhoc as md', 'n.monhoc_id','=','md.id')
        ->select('n.*','sp.name','sp.khoa','md.ten','md.giaovien')
        ->paginate(10);
    
        $dslop =DB::table('dslop as ds')
        ->where('id', $req->id)
        ->select('ds.*')
        ->paginate(10);

        $monhoc =DB::table('monhoc as mh')
        ->select('mh.*')
        ->paginate(10);
      
        return view('trangadmin.chitietthoikhoabieu')->with([
            'thoikhoabieu'=>$thoikhoabieu,
            'dslop'=>$dslop,
            'monhoc'=>$monhoc
        ]);
    }


    public function addthoikhoabieu(Request $request){

        thoikhoabieu::create([
            'monhoc_id'=> $request['monhoc_id'],
            'idlop'=>$request['idlop'],

            'ngaythang' => $request['ngaythang'],
            'tiethoc'=>$request['tiethoc'] ,
           
        ]);
            
            $dssv1= DB::table('dssv as n')
            ->where('idlop',$request['idlop'])
            ->join('dslop as dsl', 'n.idlop','=','dsl.id')
            ->select('n.*','dsl.name')
            ->get();

            $monhoc1= DB::table('monhoc as m')
            ->where('m.id',$request['monhoc_id'])
            ->join('giaovien as sp', 'm.giaovien', '=', 'sp.id')
            ->select('m.*','sp.name')
            ->get();

        $count_ds=count($dssv1);
        $tt=1;
     // dd($dssv1[0]);

        for($i = 0;$i<$count_ds;$i++)
        {
            diemdanh::create([
                'ngaythang'=> $request['ngaythang'],
                'masv'=>$dssv1[$i]->masv,
                'ten' => $dssv1[$i]->ten,
                'lop'=>$dssv1[$i]->name ,
                'monhoc'=>$monhoc1[0]->ten ,
                'giaovien'=>$monhoc1[0]->name,
                'tinhtrang'=>$tt ,

            ]);
        }

        $idlop=$request['idlop']; 
        return redirect()->route('chitietthoikhoabieu', ['id' => $idlop])->with('status','Thêm thành công');
    }

    

    public function deletethoikhoabieu(Request $request,$id)
    {
        $thoikhoabieu =thoikhoabieu::findOrFail($id);

        $thoikhoabieu1 = DB::table('thoikhoabieu as n')
        ->where('n.id',$thoikhoabieu->id)
        ->join('dslop as sp', 'n.idlop', '=', 'sp.id')
        ->join('monhoc as md', 'n.monhoc_id','=','md.id')
        ->select('n.*','sp.name','sp.khoa','md.ten','md.giaovien')
        ->get();

        $monhoc = DB::table('monhoc as n')
        ->where('n.id',$thoikhoabieu1[0]->monhoc_id)
        ->join('giaovien as sp', 'n.giaovien', '=', 'sp.id')
        ->select('sp.name')
        ->paginate(10);

       
       // dd($thoikhoabieu1);
        $idlop=$thoikhoabieu->idlop;


        $diemdanh=DB::table('diemdanh')
            ->where([
                ['monhoc', $thoikhoabieu1[0]->ten],
                ['lop', $thoikhoabieu1[0]->name],
                ['ngaythang', $thoikhoabieu1[0]->ngaythang ],
                ['giaovien', $monhoc[0]->name ],
            ]);

            $diemdanh->delete();
         //   dd($diemdanh);
       
        $thoikhoabieu->delete();
       
        return redirect()->route('chitietthoikhoabieu', ['id' => $idlop])->with('status','Xóa thành công');
    }


    ///diemdanh 
    public function trangdiemdanh()
    {

        $dslop=dslop::all();
        $dslop=dslop::paginate(10);
        

        return view('trangadmin.diemdanh')->with([
            
            'dslop'=>$dslop
        
        ]);
    }

    public function chitietdiemdanh(Request $req, $name)
    {
        $diemdanh = DB::table('diemdanh as n')
        ->where('lop',$req->name)
        ->select('n.*')
        ->paginate(10);
      
        return view('trangadmin.chitietdiemdanh')->with([
            'diemdanh'=>$diemdanh,
            
        ]);
    }


}
