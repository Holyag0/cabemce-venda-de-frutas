<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frutas Controller
 *
 * @property \App\Model\Table\FrutasTable $Frutas
 */
class FrutasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Frutas->find();
        if ($this->request->getQuery('q') || $this->request->getQuery('classificacao') || $this->request->getQuery('fresca') !== null) {
            return $this->redirect(['action' => 'search', '?' => $this->request->getQueryParams()]);
        }
        $frutas = $this->paginate($query);

        $this->set(compact('frutas'));
    }

    /**
     * View method
     *
     * @param string|null $id Fruta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fruta = $this->Frutas->get($id, contain: ['Vendas']);
        $this->set(compact('fruta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fruta = $this->Frutas->newEmptyEntity();
        if ($this->request->is('post')) {
            $fruta = $this->Frutas->patchEntity($fruta, $this->request->getData());
            if ($this->Frutas->save($fruta)) {
                $this->Flash->success(__('The fruta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fruta could not be saved. Please, try again.'));
        }
        $this->set(compact('fruta'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fruta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fruta = $this->Frutas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fruta = $this->Frutas->patchEntity($fruta, $this->request->getData());
            if ($this->Frutas->save($fruta)) {
                $this->Flash->success(__('The fruta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fruta could not be saved. Please, try again.'));
        }
        $this->set(compact('fruta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fruta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fruta = $this->Frutas->get($id);
        if ($this->Frutas->delete($fruta)) {
            $this->Flash->success(__('The fruta has been deleted.'));
        } else {
            $this->Flash->error(__('The fruta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function search()
    {
        $query = $this->Frutas->find();
        if ($this->request->getQuery('q')) {
            $query->where(['Frutas.nome ILIKE' => '%' . $this->request->getQuery('q') . '%']);
        }
        if ($this->request->getQuery('classificacao')) {
            $query->where(['Frutas.classificacao' => $this->request->getQuery('classificacao')]);
        }
        if ($this->request->getQuery('fresca') !== null) {
            $query->where(['Frutas.fresca' => (bool)$this->request->getQuery('fresca')]);
        }
        $frutas = $this->paginate($query);
        $this->set(compact('frutas'));

        $this->render('index');
    }
    // public function filter()
    // {
    //     $classificacao = $this->request->getQuery('classificacao');
    //     $fresca = $this->request->getQuery('fresca');
    //     $conditions = [];
    //     if ($classificacao) {
    //         $conditions['Frutas.classificacao'] = $classificacao;
    //     }
    //     if ($fresca !== null) {
    //         $conditions['Frutas.fresca'] = $fresca;
    //     }
    //     $frutas = $this->Frutas->find('all', ['conditions' => $conditions]);
    //     $this->set(compact('frutas'));
    // }
}
