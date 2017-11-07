<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectsInfo Controller
 *
 * @property \App\Model\Table\ProjectsInfoTable $ProjectsInfo
 */
class ProjectsInfoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $projectsInfo = $this->paginate($this->ProjectsInfo);

        $this->set(compact('projectsInfo'));
        $this->set('_serialize', ['projectsInfo']);
    }

    /**
     * View method
     *
     * @param string|null $slug Projects Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        // Get all project by slug
        //
        $projectsInfo = $this->ProjectsInfo
            ->find('all')
            ->where(['ProjectsInfo.slug' => $slug])
            ->order('ProjectsInfo.created DESC');
        $this->set(compact('projectsInfo'));
        $this->set('_serialize', ['projectsInfo']);
        // Get all infographie
        //
        $allInfo = $this->ProjectsInfo->find('all', [
            'fields' => ['name_slug'],
        ]);
        $this->set(compact('allInfo'));
        $this->set('_serializeAllInfo', ['allInfo']);
        // Get all Web
        //
        $this->loadModel('ProjectsWeb');
        $allWeb = $this->ProjectsWeb->find('all', [
            'fields' => ['slug'],
        ]);
        $this->set(compact('allWeb'));
        $this->set('_serializeAllWeb', ['allWeb']);
        // Tous les autres type d'infographie
        //
        $otherProjectsInfo = $this->ProjectsInfo->find('all', [
            'fields' => ['slug'],
            'conditions' => ['ProjectsInfo.slug !=' => $slug],
            'order' => 'rand()',
            'group' => 'ProjectsInfo.slug',
            'limit' => 3
        ]);
        $this->set(compact('otherProjectsInfo'), $otherProjectsInfo);
        $this->set('_serializeOtherProjet', ['otherProjectsInfo']);
        // Get le slug (ex: logos)
        //
        $slug = $this->ProjectsInfo->get($slug, [
            'fields' => ['slug']
        ]);
        $this->set(compact('slug'), $slug);
        $this->set('_serializeSlug', ['slug']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsInfo = $this->ProjectsInfo->newEntity();
        if ($this->request->is('post')) {
            $projectsInfo = $this->ProjectsInfo->patchEntity($projectsInfo, $this->request->data);
            if ($this->ProjectsInfo->save($projectsInfo)) {
                $this->Flash->success(__('The projects info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects info could not be saved. Please, try again.'));
        }
        $this->set(compact('projectsInfo'));
        $this->set('_serialize', ['projectsInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects Info id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsInfo = $this->ProjectsInfo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsInfo = $this->ProjectsInfo->patchEntity($projectsInfo, $this->request->data);
            if ($this->ProjectsInfo->save($projectsInfo)) {
                $this->Flash->success(__('The projects info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects info could not be saved. Please, try again.'));
        }
        $this->set(compact('projectsInfo'));
        $this->set('_serialize', ['projectsInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsInfo = $this->ProjectsInfo->get($id);
        if ($this->ProjectsInfo->delete($projectsInfo)) {
            $this->Flash->success(__('The projects info has been deleted.'));
        } else {
            $this->Flash->error(__('The projects info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
