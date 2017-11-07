<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    /**
     * View method
     *
     * @param string|null $slug Category slug.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug)
    {
        $query = $this->Categories->get($slug, [
            'contain' => []
        ]);
        $this->set('category', $query);
        $this->set('_serialize', ['category']);

        if ($slug == 'developpeur') { // developpeur
            $this->loadModel('ProjectsWeb');
            $query2 = $this->ProjectsWeb
                ->find('all')
                ->order(['created' => "DESC"]);
            $this->set('projects', $query2);
        }else{ // infographiste
            $this->loadModel('ProjectsInfo');
            $query2 = $this->ProjectsInfo
                ->find()
                ->select(['slug'])
                ->group(['ProjectsInfo.slug']);
            $this->set('projects', $query2);
        }
    }

} // END
