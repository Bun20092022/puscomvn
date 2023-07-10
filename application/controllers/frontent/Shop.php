<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library("cart");
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function lichsu()
	{
		$data['template'] = 'frontent/shop/v_lichsu';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function check()
	{
		$data['phone'] = 0;
		if(isset($_GET['tracuu'])){
			$data['phone'] = $_GET['phone'];		
		}else{
			redirect('frontent/shop/lichsu');
		}
		$data['template'] = 'frontent/shop/v_check';
			$this->load->view('frontent/layout/v_main',$data);
	}
	public function view($id){
		$data['view_order'] = $this->Model_frontent->view_id('qh_order',$id);
		$data['template'] = 'frontent/shop/v_view';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function insert($id_sanpham,$price,$priceevent){
		$id_sanpham = $id_sanpham.'';
		$price = $price.'';
		$priceevent = $priceevent.'';
		if(strlen($priceevent) > 3) {
			$priceevent = $priceevent.'';
		}else{
			$priceevent = $price;
		}
		$data = array(
			"id" => $id_sanpham,
            "name" => "Tên sản phẩm",
            "qty" => "1",
            "price" => $priceevent,
            "option" => array("price" => $price),
		);
        // Them san pham vao gio hang
		if($this->cart->insert($data)){
			redirect('frontent/shop/show','refresh');
		}else{
			redirect('main','refresh');
		}   
	}
	public function giam($id_sanpham,$price,$priceevent){
		$id_sanpham = $id_sanpham.'';
		$price = $price.'';
		$priceevent = $priceevent.'';
		if(strlen($priceevent) > 3) {
			$priceevent = $priceevent.'';
		}else{
			$priceevent = $price;
		}
		$data = array(
			"id" => $id_sanpham,
            "name" => "Tên sản phẩm",
            "qty" => "-1",
            "price" => $priceevent,
            "option" => array("price" => $price),
		);
        // Them san pham vao gio hang
		if($this->cart->insert($data)){
			redirect('frontent/shop/show','refresh');
		}else{
			redirect('main','refresh');
		}   
	}
	public function show(){
		$giohang = $this->cart->contents();
		if(isset($_POST['datmua'])){
			$order = array(
				'nguoimuahang' => $_POST['nguoimuahang'],
				'phone' => $_POST['phone'],
				'diachi' => $_POST['diachi'],
				'email' => $_POST['email'],
				'ghichu' => $_POST['ghichu'],
				'extend' => json_encode($giohang),
				'status' => 24,
				'creat' => strtotime(date('d-m-y')),
			);
			$this->db->insert('qh_order', $order);
			$this->cart->destroy();
			redirect('frontent/shop/done');
		}
		$data['template'] = 'frontent/shop/v_cart';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function done(){
		$data['template'] = 'frontent/shop/v_hoanthanh';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function deleteone($id_sanpham){
		$id_sanpham = $id_sanpham.'';
		$data=$this->cart->contents();
		foreach($data as $item){
			if($item['id'] == $id_sanpham){
				$item['qty'] = 0;
				$delOne = array("rowid" => $item['rowid'], "qty" => $item['qty']);
			}
		}
		if($this->cart->update($delOne)){
			redirect('frontent/shop/show','refresh');
		}else{
			redirect('main','refresh');
		}
	}

	public function del(){
		$this->cart->destroy();
		echo "Done";
	}
	public function update(){
		$data=$this->cart->contents();
		foreach($data as $item){
			if($item['id'] == "2"){
				$item['qty'] = 10;
				$update = array("rowid" => $item['rowid'], "qty" => $item['qty']);
			}
		}
		if($this->cart->update($update)){
			echo "Update san pham thanh cong";
		}else{
			echo "Update san pham that bai";
		}
	}

	public function total(){
		echo 'Hien tai co '.$this->cart->total_items().' san pham trong gio hang';
	}

	public function totalmoney(){
		echo 'Tong tien '.$this->cart->total().'$ trong gio hang';
	}
	public function product(){
		$data=$this->cart->contents();
		foreach($data as $item){
			if($this->cart->has_options($item['rowid'])){
				foreach($this->cart->product_options($item['rowid']) as $option_name => $option_value){
					echo "<b>$option_name</b>: $option_value</br />";
				}
			}
		}
	}
}