<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoaiTin;
use App\NguoiDung;
use App\BinhLuan;
use DB;

class AjaxController extends Controller
{
    public function getTheLoai($id){
        if($id == -1){
            $loaitin = LoaiTin::all();
        }else{
            $loaitin = LoaiTin::where("tl_ma",$id)->get();
        }
        foreach ($loaitin as $lt) {
            echo '<tr>
                    <th scope="row">'.$lt->lt_ma.'</th>
                    <td>'.$lt->lt_ten.'</td>
                    <td>'.$lt->TheLoai->tl_ten.'</td>
                    <td>'.$lt->lt_taoMoi.'</td>
                    <td>'.$lt->lt_capNhat.'</td>
                    <td>
                        <form class="d-inline" method="post" action="'.route("Backend.loaitin.delete", ["id" => $lt->lt_ma]).'">
                            '.csrf_field().'
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="'.route("Backend.loaitin.edit", ["id" => $lt->lt_ma]).'" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                    </td>
                </tr>';
        }
    }

    public function getnguoiDung($id){
        if($id == -1){
            $nd = NguoiDung::all();
        }else{
            $nd = NguoiDung::where("nnd_ma", $id)->get();
        }
        foreach ($nd as $ds) {
            echo '<table class="table table-striped mb-5 mt-5">
            
            <tr>
                <th scope="col">ID</th>
                <td>'.$ds->nd_ma.'</td>
            </tr>
            <tr>
                <th scope="col">Họ tên</th>
                <td>'.$ds->nd_hoTen.'</td>
            </tr>
            <tr>
                <th scope="col">Thuộc nhóm người dùng</th>
                <td>'.$ds->NhomNguoiDung->nnd_ten.'</td>
            </tr>
            <tr>
                <th scope="col">Email</th>
                <td>'.$ds->nd_email.'</td>
            </tr>
            <tr>
                <th scope="col">Tài khoản</th>
                <td>'.$ds->nd_taiKhoan.'</td>
            </tr>
            <tr>
                <th scope="col">Ngày sinh</th>
                <td>'.$ds->nd_ngaySinh.'</td>
            </tr>
            <tr>
                <th scope="col">Địa chỉ</th>
                <td>'.$ds->nd_diaChi.'</td>
            </tr>
            <tr>
                <th scope="col">Điện thoại</th>
                <td>'.$ds->nd_dienThoai.'</td>
            </tr>
            <tr>
                <th scope="col">Ngày tạo</th>
                <td>'.$ds->nd_taoMoi.'</td>
            </tr>
            <tr>
                <th scope="col">Ngày cập nhật</th>
                <td>'.$ds->nd_capNhat.'</td>
            </tr>
            <tr>
                <td>
                    <form class="d-inline" method="post" action="'. route('Backend.nguoidung.delete', ['id' => $ds->nd_ma]) .'">
                        '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                    </form>
                    <a href="'.route('Backend.nguoidung.edit', ['id' => $ds->nd_ma]).'" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                </td>
                <td></td>
            </tr>
        </table>';
        }
    }

    public function getloaiTin($id){
        $loaitin = LoaiTin::where("tl_ma", $id)->get();
        foreach($loaitin as $ds){
            echo '<option value="'.$ds->lt_ma.'">'.$ds->lt_ten.'</option>';
        }
    }

    public function checkpassword($user){
        // $nguoidung = DB::table('nguoidung')->where('nd_ma',$user)->first();
        // $check = $_POST["pass"];
        // if(Hash::check($nguoidung->nd_matKhau, $check)){
        //     echo "";
        // }else{
        //     echo "Mật khẩu cũ bạn nhâp không đúng";
        // }
        echo $user. "              " .$_GET["pass"];
    }

    public function store_comment(){
        $binhluan = new BinhLuan();
        $binhluan->bl_noiDung = $_GET['binhluan'];
        $binhluan->bl_ma_sub = null;
        $binhluan->tt_ma = $_GET['id_tintuc'];
        $binhluan->nd_ma = $_GET['id_nguoidung'];
        $binhluan->save();

        $cmt = DB::table('binhluan')->join('tintuc','tintuc.tt_ma','=','binhluan.tt_ma')
                ->join('nguoidung','nguoidung.nd_ma','=','binhluan.nd_ma')->orderBy('bl_taoMoi','DESC')
                ->where('tintuc.tt_ma',$_GET['id_tintuc'])->get();

        $i = 0;
        foreach($cmt as $comments){
            if($comments->bl_ma_sub == null){
                echo '<div class="khungbinhluan">';
                echo '<div class="show-cmt my-5">
                        <div id="user-cmt">
                            <div class="frame"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                            <strong>'.$comments->nd_hoTen.'</strong>
                            <div id="cmt" class="ml-5">'.$comments->bl_noiDung.'</div>
                            <span class="ml-5" style="font-size:12px"><i>'.date('d/m/Y | H:i:s',strtotime($comments->bl_taoMoi)).'</i></span>
                            <span onclick="show('.$i.')" class="ml-5" style="color:blue;cursor:pointer">Trả lời</span>
                                <div class="comment_sub ml-5" style="display:none;">
                                    <textarea name="binhluan_sub" class="binhluan" cols="40" rows="3" placeholder="Hãy nghĩ gì về tin này" style="display:block"></textarea>
                                    <input type="hidden" name="id_tintuc_sub" class="id_tintuc_sub" value="'.$_GET["id_tintuc"].'">
                                    <input type="hidden" name="bl_ma_sub" class="bl_ma_sub" value="'.$comments->bl_ma.'">
                                    <input type="hidden" name="id_nguoidung_sub" class="id_nguoidung_sub" value="'.$_GET["id_nguoidung"].'">
                                    <button type="submit" class="btn btn-primary mt-2 submit_sub" onclick="xuly('.$i.')">Trả lời</button>
                                    <button type="submit" class="btn btn-info mt-2" onclick="hide('.$i.')">Đóng</button>
                                </div>
                        </div>
                    </div>';
                    $i++;
            }
            foreach($cmt as $sub_comments){
                if($sub_comments->bl_ma != $comments->bl_ma && $sub_comments->bl_ma_sub != null && $sub_comments->bl_ma_sub == $comments->bl_ma){
                    echo '<div class="show-cmt my-5 ml-5">
                            <div id="user-cmt">
                                <div class="frame"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                                <strong>'.$sub_comments->nd_hoTen.'</strong>
                                <div id="cmt" class="ml-5">'.$sub_comments->bl_noiDung.'</div>
                                <span class="ml-5" style="font-size:12px"><i>'.date('d/m/Y | H:i:s',strtotime($sub_comments->bl_taoMoi)).'</i></span>
                            </div>
                        </div>';
                }
            }
            echo '</div>';
        }
    }

    public function test(){
        $binhluan = new BinhLuan();
        $binhluan->bl_noiDung = $_GET['binhluan'];
        $binhluan->bl_ma_sub = $_GET['bl_ma_sub'];
        $binhluan->tt_ma = $_GET['id_tintuc_sub'];
        $binhluan->nd_ma = $_GET['id_nguoidung_sub'];
        $binhluan->save();

        $cmt = DB::table('binhluan')->join('tintuc','tintuc.tt_ma','=','binhluan.tt_ma')
                ->join('nguoidung','nguoidung.nd_ma','=','binhluan.nd_ma')->orderBy('bl_taoMoi','DESC')
                ->where('tintuc.tt_ma',$_GET['id_tintuc_sub'])->get();

        $i=0;
        foreach($cmt as $comments){
            if($comments->bl_ma_sub == null){
                echo '<div class="khungbinhluan">';
                echo '<div class="show-cmt my-5">
                        <div id="user-cmt">
                            <div class="frame"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                            <strong>'.$comments->nd_hoTen.'</strong>
                            <div id="cmt" class="ml-5">'.$comments->bl_noiDung.'</div>
                            <span class="ml-5" style="font-size:12px"><i>'.date('d/m/Y | H:i:s',strtotime($comments->bl_taoMoi)).'</i></span>
                            <span onclick="show('.$i.')" class="ml-5" style="color:blue;cursor:pointer">Trả lời</span>
                                <div class="comment_sub ml-5" style="display:none;">
                                    <textarea name="binhluan_sub" class="binhluan" cols="40" rows="3" placeholder="Hãy nghĩ gì về tin này" style="display:block"></textarea>
                                    <input type="hidden" name="id_tintuc_sub" class="id_tintuc_sub" value="'.$_GET["id_tintuc_sub"].'">
                                    <input type="hidden" name="bl_ma_sub" class="bl_ma_sub" value="'.$comments->bl_ma.'">
                                    <input type="hidden" name="id_nguoidung_sub" class="id_nguoidung_sub" value="'.$_GET["id_nguoidung_sub"].'">
                                    <button type="submit" class="btn btn-primary mt-2 submit_sub" onclick="xuly('.$i.')">Trả lời</button>
                                    <button type="submit" class="btn btn-info mt-2" onclick="hide('.$i.')">Đóng</button>
                                </div>
                        </div>
                    </div>';
                    $i++;
            }
            foreach($cmt as $sub_comments){
                if($sub_comments->bl_ma != $comments->bl_ma && $sub_comments->bl_ma_sub != null && $sub_comments->bl_ma_sub == $comments->bl_ma){
                    echo '<div class="show-cmt my-5 ml-5">
                            <div id="user-cmt">
                                <div class="frame"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                                <strong>'.$sub_comments->nd_hoTen.'</strong>
                                <div id="cmt" class="ml-5">'.$sub_comments->bl_noiDung.'</div>
                                <span class="ml-5" style="font-size:12px"><i>'.date('d/m/Y | H:i:s',strtotime($sub_comments->bl_taoMoi)).'</i></span>
                            </div>
                        </div>';
                }
            }
            echo '</div>';
        }
    }
}