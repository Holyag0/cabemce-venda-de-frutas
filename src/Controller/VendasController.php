<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Vendas Controller
 *
 * @property \App\Model\Table\VendasTable $Vendas
 */
class VendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Vendas->find()
            ->contain(['Users', 'Frutas']);
        $vendas = $this->paginate($query);

        $this->set(compact('vendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venda = $this->Vendas->get($id, contain: ['Users', 'Frutas']);
        $this->set(compact('venda'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venda = $this->Vendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $descontoPermitido = [5, 10, 15, 20, 25];
            $desconto = isset($data['desconto']) ? $data['desconto'] : 0;
            if (!in_array($desconto, $descontoPermitido)) {
                $this->Flash->error(__('Invalid discount value.'));
                return $this->redirect(['action' => 'add']);
            } 
            $data['valor'] = str_replace(',', '.', $data['valor']);
            $data['quantidade'] = str_replace(',', '.', $data['quantidade']);
            $valorOriginal = $data['valor'] * $data['quantidade']; 
            $valorDesconto = $valorOriginal * ($desconto / 100);
            $valorTotal = $valorOriginal - $valorDesconto;
            if ($valorTotal < 0) {
                $this->Flash->error(__('The discount applied is too high and makes the total value negative.'));
            } else {
                $data['valor_total'] = round($valorTotal, 2); 
                $data['desconto'] = $desconto;
                $venda = $this->Vendas->patchEntity($venda, $data);
                if ($this->Vendas->save($venda)) {
                    $this->Flash->success(__('The sale has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $users = $this->Vendas->Users->find('list', ['limit' => 200]);
        $frutas = $this->Vendas->Frutas->find('list', ['limit' => 200]);
        $descontos = [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%'];
        $this->set(compact('venda', 'users', 'frutas', 'descontos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venda = $this->Vendas->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $descontoPermitido = [5, 10, 15, 20, 25];
            $desconto = isset($data['desconto']) ? $data['desconto'] : 0;
            
            if (!in_array($desconto, $descontoPermitido)) {
                $this->Flash->error(__('Invalid discount value.'));
                return $this->redirect(['action' => 'edit', $id]);
            } 

            $data['valor'] = str_replace(',', '.', $data['valor']);
            $data['quantidade'] = str_replace(',', '.', $data['quantidade']);
            $valorOriginal = $data['valor'] * $data['quantidade']; 
            $valorDesconto = $valorOriginal * ($desconto / 100);
            $valorTotal = $valorOriginal - $valorDesconto; 

            if ($valorTotal < 0) {
                $this->Flash->error(__('The discount applied is too high and makes the total value negative.'));
            } else {
                $data['valor_total'] = round($valorTotal, 2); 
                $data['desconto'] = $desconto;
                $venda = $this->Vendas->patchEntity($venda, $data);
                if ($this->Vendas->save($venda)) {
                    $this->Flash->success(__('The sale has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sale could not be updated. Please, try again.'));
            }
        }
        $users = $this->Vendas->Users->find('list', ['limit' => 200]);
        $frutas = $this->Vendas->Frutas->find('list', ['limit' => 200]);
        $descontos = [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%'];
        $this->set(compact('venda', 'users', 'frutas', 'descontos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('The venda has been deleted.'));
        } else {
            $this->Flash->error(__('The venda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function report(){
       
        // $this->loadComponent('Authentication.Authentication');
        // $identity = $this->Authentication->getIdentity();
        // if ($identity->role !== 'vendedor') {
        //     $this->Flash->error(__('You are not authorized to access this report.'));
        //     return $this->redirect(['action' => 'index']);
        // }

        $vendas = $this->Vendas->find('all', [
            'contain' => ['Users', 'Frutas'],
            'order' => ['Vendas.created' => 'DESC']
        ]);

        $this->set(compact('vendas'));
    }

    public function sell($id = null)
    {
        $venda = $this->Vendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $desconto = isset($data['desconto']) ? $data['desconto'] : 0;
            $valorTotal = $data['valor'] - ($data['valor'] * ($desconto / 100));
            $data['valor_total'] = $valorTotal;
            $venda = $this->Vendas->patchEntity($venda, $data);
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The fruit has been sold.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fruit could not be sold. Please, try again.'));
        }
        $frutas = $this->Vendas->Frutas->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'frutas'));
    }
   
}
