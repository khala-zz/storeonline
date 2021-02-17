<?php
namespace App\Components;

use App\Models\Permission;

class PermissionRecusive{
	private $html;
	public function __construct(){
		$this -> html = '';
	}
	public function permissionRecusiveAdd($parentId = 0,$subMark = ''){
		$data = Permission::where('parent_id',$parentId) -> get();
		foreach($data as $dataItem){
			$this ->html .= "<option value = '".$dataItem -> id."'>".$subMark.$dataItem -> name."</option>";
			$this -> permissionRecusiveAdd($dataItem -> id,$subMark. '--');
		}
		return $this -> html;
	}

	public function permissionRecusiveEdit($parentIdPermissionEdit,$parentId = 0,$subMark = ''){
		$data = Permission::where('parent_id',$parentId) -> get();
		foreach($data as $dataItem){
			if($parentIdPermissionEdit == $dataItem -> id){
				$this ->html .= "<option selected value = '".$dataItem -> id."'>".$subMark.$dataItem -> name."</option>";
			}
			else{
				$this ->html .= "<option value = '".$dataItem -> id."'>".$subMark.$dataItem -> name."</option>";
			}
			
			$this -> permissionRecusiveEdit($parentIdPermissionEdit,$dataItem -> id,$subMark. '--');
		}
		return $this -> html;
	}
}