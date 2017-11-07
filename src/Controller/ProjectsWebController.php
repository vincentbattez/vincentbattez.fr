<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectsWeb Controller
 *
 * @property \App\Model\Table\ProjectsWebTable $ProjectsWeb
 */
class ProjectsWebController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $projectsWeb = $this->paginate($this->ProjectsWeb);

        $this->set(compact('projectsWeb'));
        $this->set('_serialize', ['projectsWeb']);
    }

    /**
     * View method
     *
     * @param string|null $id Projects Web id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        // Un projet web en particulier
        //
        $projectsWeb = $this->ProjectsWeb->get($slug); // SELECT * FROM ProjectsWeb WHERE primaryKey = $slug;
        $this->set('projectsWeb', $projectsWeb);
        $this->set('_serializeProjet', ['projectsWeb']);
        // Techno use dans ce projet
        //
        $this->loadModel('techno');
        $technos = $this->techno
            ->find()
            ->where(['id_projectweb' => $projectsWeb->id]);
        $this->set(compact('technos'));
        $this->set('_serializetechnos', ['technos']);
        // Tous le autres projets web
        //
        $otherprojectsWeb = $this->ProjectsWeb->find('all', [
            'conditions' => ['ProjectsWeb.slug !=' => $slug],
            'order' => 'rand()',
            'limit' => 3
        ]);
        $this->set('otherprojectsWeb', $otherprojectsWeb);
        $this->set('_serializeOtherProjet', ['otherprojectsWeb']);
        // Get all infographie
        //
        $this->loadModel('ProjectsInfo');
        $allInfo = $this->ProjectsInfo->find('all', ['fields' => ['name_slug']]);
        $this->set(compact('allInfo'));
        $this->set('_serializeAllInfo', ['allInfo']);
        // Get all Web
        //
        $allWeb = $this->ProjectsWeb->find('all', ['fields' => ['slug']]);
        $this->set(compact('allWeb'));
        $this->set('_serializeAllWeb', ['allWeb']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsWeb = $this->ProjectsWeb->newEntity();
        if ($this->request->is('post')) {
            $projectsWeb = $this->ProjectsWeb->patchEntity($projectsWeb, $this->request->data);
            if ($this->ProjectsWeb->save($projectsWeb)) {
                $this->Flash->success(__('The projects web has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects web could not be saved. Please, try again.'));
        }
        $this->set(compact('projectsWeb'));
        $this->set('_serialize', ['projectsWeb']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects Web id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($slug = null)
    {
        $projectsWeb = $this->ProjectsWeb->get($slug, [
            'fields' => ['name', 'avis', 'rating']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsWeb = $this->ProjectsWeb->patchEntity($projectsWeb, $this->request->data);
            if ($this->ProjectsWeb->save($projectsWeb)) {
                $this->Flash->success(__('Votre avis a bien été publié'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('Il y a eu un problème lors de la publication de votre avis, réessayer de nouveau.'));
        }
        $this->set(compact('projectsWeb'));
        $this->set('_serialize', ['projectsWeb']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects Web id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsWeb = $this->ProjectsWeb->get($id);
        if ($this->ProjectsWeb->delete($projectsWeb)) {
            $this->Flash->success(__('The projects web has been deleted.'));
        } else {
            $this->Flash->error(__('The projects web could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
