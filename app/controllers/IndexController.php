<?php

use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class IndexController extends Controller
{


    public function indexAction()
    {

        $this->assets->addCss("/css/index.css");

        $currentPage = $this->request->getQuery("page", "int");

        $builder = new Phalcon\Mvc\Model\Query\Builder();
        $builder->from("Klub");
        $paginator = new PaginatorQueryBuilder(
            [
                "builder" => $builder,
                "limit" => 5,
                "page" => $currentPage,
            ]
        );
        $this->view->page = $paginator->getPaginate();
    }

    public function followAction($id)
    {
        $var = new Pretplata();

        $var->save(
            [
                "id_Korisnik" => $this->session->get("id"),
                "id_Klub" => $id,
                "notifikacije" => 0
            ]
        );
        $this->view->disable();
        $this->redirectBack();

    }

    public function unfollowAction($id)
    {
        $var = new Pretplata();

        $val = $var->find([
                "id_Korisnik = :name: AND id_Klub = :type:",

                "bind" => [
                    "name" => $this->session->get("id"),
                    "type" => $id,
                ],
            ]
        );

        $val->delete();


        $this->view->disable();

        $this->redirectBack();

    }

    private function redirectBack()
    {
        $url = parse_url($this->request->getHTTPReferer(), PHP_URL_HOST);

        if ($url == $this->request->getHttpHost()) {
            $this->response->redirect($this->request->getHTTPReferer());
        } else {
            $this->response->redirect("/index");
        }
    }
}

?>