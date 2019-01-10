<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Whodd cell
 */
class WhoddCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($fieldId=null)
    {
        $this->loadModel('Ccode');
        $contryList = $this->Ccode->find();
        $this->set(compact('fieldId','contryList'));
    }

    public function WhoddBrowser() {
    }
}
// <?php

// namespace Application\Controller;

// use Zend\Mvc\Controller\AbstractActionController;
// use Zend\View\Model\ViewModel;
// use Zend\View\Model\JsonModel;
// use Doctrine\ORM\QueryBuilder;
// use Doctrine\ORM\EntityManager;

// class WhodraController extends AbstractController
// {

//     const IS_DRUG_CODE = 1;
//     const IS_MED_PROD_ID = 2;
//     const IS_TRADE_NAME = 1;
//     const IS_INGREDIENT = 2;
    
//     public function indexAction()
//     {
//         if (!$this->getRequest()->isXmlHttpRequest()) {
//             return $this->redirect()->toRoute('dashboard');
//         }
        
//         $whodraForm = new \Application\Form\Whodra\WhodraBrowserForm();
//         $variables = array(
//             'form' => $whodraForm
//         );

//         $viewPart = new ViewModel();
//         $viewPart->setTerminal(true);
//         $viewPart->setTemplate('application/whodra/index');
//         $viewPart->setVariables($variables);
//         $htmlRender = $this->getServiceLocator()->get('viewrenderer')->render($viewPart);

//         $jsonModel = new JsonModel();
//         $jsonModel->setVariables(array(
//             'success' => true,
//             'whodraFormHtml' => $htmlRender
//         ));
//         return $jsonModel;
//     }
    
//     public function searchAction()
//     {
//         if (!$this->getRequest()->isXmlHttpRequest()) {
//             return $this->redirect()->toRoute('dashboard');
//         }

//         $request = $this->getRequest();
//         $jsonResponseVar = array();
//         $postdata = $request->getPost()->toArray();

//         $paramList = array();
//         //$productType = $postdata['product_type'];
//         $atcCode = trim($postdata['atc-code']);
//         $drugMedicinalRadio = trim($postdata['drug-medicinal-radio']);
//         $drugMedicinalText = trim($postdata['drug-medicinal-text']);
//         $tradeIngredientRadio = trim($postdata['trade-ingredient-radio']);
//         $tradeIngredientText = trim($postdata['trade-ingredient-text']);
//         $formulation = trim($postdata['formulation']);
//         $country = trim($postdata['country']);
//         $fullSearch = $postdata['full-search'];

//         $em = $this->getEntityManager();
//         $connection = $em->getConnection();

//         $columns = array(
//             'md.DrugName as trade_name',
//             'CONCAT_WS(".", md.DrugRecNo, md.Seq1, md.Seq2) as drug_code', 
//             'dc.ATCCodes as atc_code',
//             'md.MedProdID as medicinal_product_id',
//             'md.DrugRecNo',
//             'md.Seq1',
//             'md.Seq2',
//             'md.Seq3',
//             'md.Seq4',
//             'md.Generic as generic',
//             'group_concat(it.SubstanceID) as substance_ids',
//             'group_concat(st.SubstanceName) as ingredients',            
//             'pf.PharmFormText as formulation',
//             'sr.StrengthText as strength',
//             'oz.OrgName as mah',
//             'cc.countryName as country'
//         );

//         try {
//             $qptb = new QueryBuilder($em);
//             $qptb->from("MpData","md");
//             $qptb->select($columns);
//             $qptb->leftJoin("DenormComposition", "dc", "ON", "(md.DrugRecNo = dc.DrugRecNo) and (md.Seq1 = dc.Seq1) and (md.Seq2 = dc.Seq2)");
//             $qptb->leftJoin("Ingredient", "it", "ON", "(md.DrugRecNo = it.DrugRecNo) and (md.Seq1 = it.Seq1) and (md.Seq2 = it.Seq2)");
//             $qptb->leftJoin("Substance", "st", "ON", "it.SubstanceID = st.SubstanceID");
//             $qptb->leftJoin("Ccode", "cc", "ON", "md.Country = cc.CountryCode");
//             $qptb->leftJoin("Organization", "oz", "ON", "md.MAH = oz.OrganizationID");
//             $qptb->leftJoin("PharmForm", "pf", "ON", "md.Seq3 = pf.PharmFormID");
//             $qptb->leftJoin("Strength", "sr", "ON", "md.Seq4 = sr.StrengthID");
//             $qptb->where( '1 = 1' );
            
//             if( $atcCode != '' ){
//                 $qptb->andWhere('dc.ATCCodes LIKE ?');
//                 array_push($paramList,'%'.$atcCode.'%');
//             }
            
//             if( $drugMedicinalText != '' ){
//                 $drugMedicinalCondition = $drugMedicinalRadio == self::IS_MED_PROD_ID ? 'md.MedProdID' : 'md.DrugRecNo' ;
//                 $qptb->andWhere($drugMedicinalCondition.' LIKE ?');
//                 array_push($paramList,'%'.$drugMedicinalText.'%');
//             }
            
//             if( $tradeIngredientText != '' && $tradeIngredientRadio == self::IS_TRADE_NAME ){
//                 $qptb->andWhere('md.DrugName LIKE ?');
//                 array_push($paramList,'%'.$tradeIngredientText.'%');
//             }
            
//             if( $country != '0' ){
//                 $qptb->andWhere('md.Country LIKE ?');
//                 array_push($paramList,$country);
//             }
            
//             if( $tradeIngredientText != '' && $tradeIngredientRadio == self::IS_INGREDIENT ){
//                 $qptb->having('ingredients LIKE ?');
//                 array_push($paramList,'%'.$tradeIngredientText.'%');
//             }
            
//             if( $formulation != '' ){
//                 $qptb->andHaving('formulation LIKE ?');
//                 array_push($paramList,'%'.$formulation.'%');
//                 $qptb->orHaving('strength LIKE ?');
//                 array_push($paramList,'%'.$formulation.'%');
//             }
            
//             $qptb->groupBy('medicinal_product_id');
//             $qptb->addOrderBy('trade_name', 'ASC');
//             $qptb->addOrderBy('mah', 'ASC');
            
//             $params = $paramList;
            
//             $drugList = $connection->executeQuery($qptb, $params)->fetchAll();
//             $resultCount = count($drugList);
            
//             $variables = array(
//                 'searchResult' => $drugList
//             );
            
//             $viewPart = new ViewModel();
//             $viewPart->setTerminal(true);
//             $viewPart->setTemplate('application/whodra/search-result');
//             $viewPart->setVariables($variables);
//             $htmlRender = $this->getServiceLocator()->get('viewrenderer')->render($viewPart);

//             $jsonResponseVar = array(
//                 'success' => true,
//                 'rowCount' => $resultCount,
//                 'drugListGrid' => $htmlRender
//             );
            
//         } catch (Exception $ex) {
//             $jsonResponseVar = array(
//                 'success' => false
//             );
//         }
        
//         $jsonModel = new JsonModel();
//         $jsonModel->setVariables($jsonResponseVar);
//         return $jsonModel;
//     }


// }


