<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectsController Controller
 *
 * @property \App\Model\Table\ProjectsControllerTable $ProjectsController
 */
class ProjectsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Projects Web id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $this->loadModel('ProjectsWeb');
        $this->loadModel('ProjectsInfo');
        //
        //
        // Get Info by slug
        //
        //
        $nbLivrables = (int) 0;
        $infos = $this->ProjectsInfo
            ->find()
            ->where(['name_slug' => $slug]);
        foreach ($infos as $info)
        {
            $slug = (string) h($info->name_slug);
            $type = (string) h($info->slug);
            $this->set(compact('slug', 'type'));
            $nbLivrables++;
        }
        $this->set(compact('infos'));
        $this->set('_serializeInfo', ['info']);
        //
        //
        // Get Web by slug
        //
        //
        $web = $this->ProjectsWeb
            ->find()
            ->where(['slug' => $slug]);
        foreach ($web as $sites)
        {
            $pWeb = (is_numeric($sites->id) && !empty($sites->id)) ? true : false;
            if ($pWeb)
            {
                $name = (string) h($sites->name);
                $slogan = (string) h($sites->slogan);
                $slug = (string) h($sites->slug);
                $content = (string) h($sites->content);
                $url = (string) h($sites->url);
                $type_avis = (int) h($sites->type_avis);
                $avis = (string) h($sites->avis);
                $rating = (int) h($sites->rating);
                $created = (string) h($sites->created->i18nformat('dd MMMM YYYY'));
                $site =
                    [
                        'name' => $name,
                        'slogan' => $slogan,
                        'slug' => $slug,
                        'content' => $content,
                        'url' => $url,
                        'type_avis' => $type_avis,
                        'avis' => $avis,
                        'rating' => $rating,
                        'created' => $created
                    ];
                $nbLivrables++;
                $this->set(compact('site'));
                $this->set('_serializeWeb', ['web']);
            }
        }
        $this->set(compact('nbLivrables'));
        //
        //
        // Get only
        //
        //
    }
}
