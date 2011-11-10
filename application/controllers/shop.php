<?php 
 class Shop extends CI_Controller{
 	function catalog(){		
 		$this->load->model('chompas_model');
 		$chompas = $this->chompas_model->getAll();

		$is_ajax = $this->input->post('ajax');		
		$data['main_content'] = 'catalogo';
		$data['chompas'] = $chompas;

		if($is_ajax){
			$this->load->view('catalogo', $data);
		} else{			
			$this->load->view('includes/template', $data);			
		}

	}

	function add(){
		$this->load->model('chompas_model');
		$id = $this->input->post('id');
		$chompa = $this->chompas_model->get($id);
		$id = (string)$id;
		$cart = $this->cart->contents();
		$data_insert = array(
	        'id'      => $id,
	        'qty'     => 1,
	        'price'   => $chompa->precio,
	        'name'    => $chompa->nombre
	    );
		if(count($cart)>0){
			foreach($cart as $producto){
				if($producto['id'] == $id){
					$data['rowid'] = $producto['rowid'];
					$data['qty'] = $producto['qty'] + 1;
					$this->cart->update($data);					
					redirect('shop/catalog');
				}
			}
			$this->cart->insert($data_insert);		
			redirect('shop/catalog');
			
		} else{
	        $this->cart->insert($data_insert);	 
	        redirect('shop/catalog');       
    	}
	}

	function remove(){		
		$rowid = $this->input->post('rowid');
		$data['rowid'] = $rowid;
		$data['qty'] = 0;
		$this->cart->update($data);
		redirect('shop/catalog');
	}

	function destroy(){
		$this->cart->destroy();
		redirect('shop/catalog');
	}

	function checkout(){
		$this->load->model('chompas_model');	
		$qtys = $this->input->post('qty');
		$rowids = $this->input->post('rowid');
		$checked = array_combine($rowids, $qtys);
		$chompas = $this->cart->contents();
		foreach($chompas as $chompa){
			foreach($checked as $rowid => $qty){
				if($chompa['rowid'] == $rowid){
					$data = array(
						'rowid' => $rowid,
						'qty' => $qty
					);
					$this->cart->update($data);					
				}
			}
		}			
		$chompas = $this->cart->contents();

		foreach($chompas as $chompa){
			$this->chompas_model->updateQty($chompa['id'], $chompa['qty']);	
		}
		$this->checkOrders();
		$this->destroy();
	}

	function checkOrders(){
		$this->load->model('chompas_model');
		$this->load->model('pedido_model');
		$chompas = $this->chompas_model->getAll();
		foreach($chompas as $chompa){
			if( $chompa->stock_actual < $chompa->stock_minimo && $chompa->cantidad_pendiente == 0 ){
				$data = array(
					'cantidad_pendiente' => $chompa->unidades_pedido
				);
				$this->chompas_model->actualizar($chompa->id, $data);
				$this->pedido_model->realizarPedido($chompa->id, $chompa->id_insumo);		
			}
		}
	}
 }