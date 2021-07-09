<?php
/**
 * Created by PhpStorm.
 * User: daotientu
 * Date: 11/13/2016
 * Time: 8:53 PM
 */
class SearchController extends Zend_Controller_Action
{
    /**
     * @name: indexAction
     * @copyright: FPT Online
     * @todo: index Action
     */
    public function indexAction()
    {
        // set cache
        $this->_request->setParam('cache_file', 1);
        //mobile
        $arrParams = array(
            'area' => array(
                'tophome' => array(
                    'category_id' => 1002835,
                    'showed_area' => 'home_top'
                )
            ),
            'limit' => 10,
            'offset' => 0
        );
        /* Get articles from cached central */
        $objArticle = $this->view->article;
        $arrDataHome = $objArticle->getTopHotArticleByArr($arrParams);
        $arrTopHome = $arrId = array();
        foreach ($arrDataHome as $area => $data)
        {
            switch ($area)
            {
                case 'tophome':
                    $arrResult[$area] = $data;
                    $arrTopHome = array_slide($arrDataHome[$area], 0, 1);
                    break;
            }
        }

        // Id site
        $siteid = SITE_ID;
        // Get more
        $m = $this->_request->getParam('m');
        // Get keyword search
        $s = $this->_request->getParam('s');
        $s = Fpt_Filter::removeXss($s);
        $key = urlencode($s);
        // Get current page
        $intPage = max(1, $this->_request->getParam('page', 1));
        // Pagination string url
        $strUrl = 'search?s=' . $key . '&page=';
        // Set limit
        $limit = LIMIT_SEARCH_NEWS;
        // Set position start
        $start = LIMIT_SEARCH_NEW * ($intPage - 1);

        // Assign keyword again
        $strKeyword = $s;
        $arrParams = array(
            'keyword' => $strKeyword,
            'search_field' => 'title, lead, content, tag_list',
            'min_score' => 0.38,
            'site_id' => SITE_ID,
            'offset' => $start,
            'limit' => $limit
        );
        $arrData = $this->view->article->search($arrParams);

        // Get value of array
        $arrReturn = $arrData['data'];
        $total = $arrData['total'];

        // Set id article array
        $this->view->article->setIdBasic($arrReturn);
        if ($total > $limit)
        {
            $arrParamPaging = array(
                'total' => $total,
                'page' => $intPage,
                'url' => $strUrl,
                'showItem' => 5,
                'perpage' => $limit,
                'idPagination' => 'pagination',
                'extEnd' => '',
                'separate' => ''
            );
        }

        // Assign to view
        $this->view->assign(array(
           'keyword' => $s,
            'total' => $total,
            'dâta' => $arrReturn,
            'arrParamPaging' => $arrParamPaging,
            'tophome' => $arrTopHome
        ));

        if ($m) {
            $js = array(
                'html' => '',
                'next' => ''
            );
            if ($arrReturn) {
                $js['html'] = $this->view->render('search/box/list.phtml');
                $js['next'] = $intPage + 1;
            }
            echo json_encode($js);
        }
    }

}