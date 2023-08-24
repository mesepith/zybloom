<?php
namespace WOPB\blocks;

defined('ABSPATH') || exit;

class Product_Slider{
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes($default = false){

        $attributes = array(
            'blockId' => [
                'type' => 'string',
                'default' => '',
            ],
            'align' => [
                'type' => 'string',
                'default' => 'full',
            ],

            //General Style
            'layout' => ['type' => 'string', 'default' => 'layout1'],
            'height' => [
                'type' => 'object',
                'default' => (object)['lg' => '600', 'unit' => 'px']
            ],
            'slideAnimation' => ['type' => 'string', 'default' => 'default'],
            'autoPlay' => ['type' => 'boolean', 'default' => true],
            'slideSpeed' => ['type' => 'string', 'default' => '3000'],
            'slidesToShow' => ['type' => 'object', 'default' => (object)['lg' => '1', 'sm' => '1', 'xs' => '1']],
            'contentAlign' => [
                'type' => 'string',
                'default' => (object)['lg' => 'left']
            ],
            'contentPadding' => [
                'type' => 'object',
                'default' => (object)['lg' => (object)['unit' => 'px']],
            ],
            'showImage' => ['type' => 'boolean', 'default' => true],
            'showTitle' => ['type' => 'boolean', 'default' => true],
            'showTaxonomy' => ['type' => 'boolean', 'default' => true],
            'showDescription' => ['type' => 'boolean', 'default' => true],
            'showPrice' => ['type' => 'boolean', 'default' => true],
            'showCart' => ['type' => 'boolean', 'default' => true],
            'showArrows' => ['type' => 'boolean', 'default' => true],
            'showDots' => ['type' => 'boolean', 'default' => true],

            //Query Style
            'queryType' => [
                'type' => 'string',
                'default' => 'product'
            ],
            'queryNumber' => [
                'type' => 'string',
                'default' => 8,
            ],
            'queryStatus' => [
                'type' => 'string',
                'default' => 'all',
            ],
            'queryExcludeStock' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'queryCat' => [
                'type' => 'string',
                'default' => '',
            ],
            'queryOrderBy' => [
                'type' => 'string',
                'default' => 'date'
            ],
            'queryOrder' => [
                'type' => 'string',
                'default' => 'desc',
            ],
            'queryInclude' => [
                'type' => 'string',
                'default' => '',
            ],
            'queryExclude' => [
                'type' => 'string',
                'default' => '[]',
            ],
            'queryOffset' => [
                'type' => 'string',
                'default' => '0',
            ],
            'queryQuick' => [
                'type' => 'string',
                'default' => '',
            ],
            'queryProductSort' => [
                'type' => 'string',
                'default' => 'null',
            ],
            'querySpecificProduct' => [
                'type' => 'string',
                'default' => '[]',
            ],
            'queryAdvanceProductSort' => [
                'type' => 'string',
                'default' => 'null',
            ],
            'queryTax' => [
                'type' => 'string',
                'default' => 'product_cat',
            ],
            'queryTaxValue' => [
                'type' => 'string',
                'default' => '[]',
            ],
            'queryRelation' => [
                'type' => 'string',
                'default' => 'OR',
            ],
            'queryIncludeAuthor' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'queryProductSort','condition'=>'!=','value'=>'choose_specific'],
                        ],
                    ],
                ],
            ],
            'queryExcludeAuthor' => [
                'type' => 'string',
                'default' => '[]',
            ],
            'queryStockStatus' => [
                'type' => 'string',
                'default' => '[]',
            ],


            //Content Style
            'bgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => ''],
                'style' => [
                    ['selector' => '{{WOPB}} .wopb-block-wrapper .wopb-slider-section']
                ]
            ],
            'margin' => [
                'type' => 'object',
                'default' => (object)['lg' => (object)['top' => 0, 'bottom' => 0, 'unit' => 'px']],
            ],
            'padding' => [
                'type' => 'object',
                'default' => (object)['lg' => (object)['top' => 0, 'bottom' => 0, 'unit' => 'px']],
            ],
            'bgOverlay' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'border' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#dfb0a8',
                    'type' => 'solid',
                ],
            ],
            'radius' => [
                'type' => 'object',
                'default' => (object)['lg' => '2', 'unit' => 'px'],
            ],
            'boxshadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                ],
            ],
            'hoverBgOverlay' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'hoverBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#ff5845',
                    'type' => 'solid',
                ],
            ],
            'hoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => '2', 'unit' => 'px'],
            ],
            'hoverBoxshadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                ],
            ],


            //Taxonomy Style
            'taxonomyUnderTitle' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'taxonomyType' => [
                'type' => 'string',
                'default' => 'product_cat',
            ],
            'taxonomySpacing' => [
                'type' => 'object',
                'default' => 10,
            ],
            'taxonomyItemSpacing' => [
                'type' => 'object',
                'default' => 10,
            ],
            'taxonomyTypo' => [
                'type' => 'object',
                'default' => (object)[
                    'openTypography' => 1,
                    'size' => ['lg' => 14, 'unit' => 'px'],
                    'height' => ['lg' => 18, 'unit' => 'px'],
                    'decoration' => 'none',
                    'family' => '',
                    'weight' => 400
                ],
            ],
            'taxonomyPadding' => [
                'type' => 'object',
                'default' => (object)['lg' => (object)['top' => '', 'bottom' => '', 'left' => '', 'right' => '', 'unit' => 'px']],
            ],
            'taxonomyColor' => [
                'type' => 'string',
                'default' => '#0e1523',
            ],
            'taxonomyBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => ''],
            ],
            'taxonomyBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#B3B3B3',
                    'type' => 'solid'
                ],
            ],
            'taxonomyRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => '2', 'unit' => 'px'],
            ],
            'taxonomyHoverColor' => [
                'type' => 'string',
                'default' => '#0e1523',
            ],
            'taxonomyHoverBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => ''],
            ],
            'taxonomyHoverBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#dfb0a8',
                    'type' => 'solid'
                ],
            ],
            'taxonomyHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => '2', 'unit' => 'px'],
            ],


            //Title style
            'titleTag' => [
                'type' => 'string',
                'default' => 'h3',
            ],
            'titleWidth' => [
                'type' => 'object',
                'default' => (object)['lg' => '', 'unit' => 'px'],
            ],
            'titleTypo' => [
                'type' => 'object',
                'default' => (object)[
                    'openTypography' => 1,
                    'size' => ['lg' => 16, 'unit' => 'px'],
                    'height' => ['lg' => 18, 'unit' => 'px'],
                    'decoration' => 'none',
                    'family' => '',
                    'weight' => 400,
                    'transform' => 'uppercase',
                ],
            ],
            'titleColor' => [
                'type' => 'string',
                'default' => '#0e1523',
            ],
            'titleHoverColor' => [
                'type' => 'string',
                'default' => '',
            ],
            'titleSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' => 16, 'unit' => 'px'],
            ],
            'titleHoverEffect' => [
                'type' => 'string',
                'default' => 'none',
            ],
            'titleAnimationColor' => [
                'type' => 'string',
                'default' => 'Black',
            ],

            //Description Style
            'descriptionWidth' => [
                'type' => 'object',
                'default' => (object)['lg' => '', 'unit' => 'px'],
            ],
            'descriptionLimit' => [
                'type' => 'string',
                'default' => 190,
            ],
            'descriptionTypo' => [
                'type' => 'object',
                'default' => (object)[
                    'openTypography' => 1,
                    'size' => ['lg' => 16, 'unit' => 'px'],
                    'height' => ['lg' => 18, 'unit' => 'px'],
                    'decoration' => 'none',
                    'family' => '',
                    'weight' => 400,
                ],
            ],
            'descriptionColor' => [
                'type' => 'string',
                'default' => '#0e1523',
            ],
            'descriptionHoverColor' => [
                'type' => 'string',
                'default' => '',
            ],
            'descriptionSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' => 10, 'unit' => 'px'],
            ],


            //Price Style
            'priceOverDescription' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'priceTypo' => [
                'type' => 'object',
                'default' => (object)[
                    'openTypography' => 1,
                    'size' => ['lg' => 18, 'unit' => 'px'],
                    'height' => ['lg' => 18, 'unit' => 'px'],
                    'decoration' => 'none',
                    'family' => '',
                    'weight' => 400,
                ],
            ],
            'salePriceColor' => [
                'type' => 'string',
                'default' => '#0e1523',
            ],
            'regularPriceColor' => [
                'type' => 'string',
                'default' => '#0e1523',
            ],
            'priceItemSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' => 10, 'unit' => 'px'],
            ],
            'priceSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' => 20, 'unit' => 'px'],
            ],
            'showPriceLabel' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'priceLabelText' => [
                'type' => 'string',
                'default' => 'Price: ',
            ],


            //Add To Cart Style
            'showQty' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'showPlusMinus' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'cartQtyColor' => [
                'type' => 'string',
                'default' => ''
            ],
            'cartQtyBg' => [
                'type' => 'string',
                'default' => '#e4e4e4',
            ],
            'cartQtyBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 1,
                    'width' => (object)['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0],
                    'color' => '#f5f5f5',
                    'type' => 'solid'
                ],
            ],
            'cartQtyRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => (object)['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0, 'unit' => 'px']],
            ],
            'cartQtyPadding' => [
                'type' => 'object',
                'default' => (object)['top' => 0, 'right' => 10, 'bottom' => 0, 'left' => 10, 'unit' => 'px'],
            ],
            'plusMinusPosition' => [
                'type' => 'string',
                'default' => 'right',
            ],
            'plusMinusColor' => [
                'type' => 'string',
                'default' => '',
            ],
            'plusMinusBg' => [
                'type' => 'string',
                'default' => '#e4e4e4',
            ],
            'plusMinusHoverColor' => [
                'type' => 'string',
                'default' => '',
            ],
            'plusMinusHoverBg' => [
                'type' => 'string',
                'default' => '#222',
            ],

            'plusMinusSize' => [
                'type' => 'string',
                'default' => 10,
            ],

            'plusMinusBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                    'type' => 'solid'
                ],
            ],

            'plusMinusRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => 0, 'unit' => 'px'],
            ],

            'plusMinusPadding' => [
                'type' => 'object',
                'default' => (object)[
                    'lg' => (object)['top' => 2, 'bottom' => 2, 'left' => 10, 'right' => 10, 'unit' => 'px']
                ],
            ],

            'cartText' => [
                'type' => 'string',
                'default' => 'Add To Cart',
            ],

            'cartSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' => 3, 'unit' => 'px'],
            ],

            'cartTextTypo' => [
                'type' => 'object',
                'default' => (object)[
                    'openTypography' => 1,
                    'size' => ['lg' => 16, 'unit' => 'px'],
                    'height' => ['lg' => 18, 'unit' => 'px'],
                    'decoration' => 'none',
                    'family' => '',
                    'weight' => 500
                ],
            ],

            'cartButtonPadding' => [
                'type' => 'object',
                'default' => (object)['lg' => (object)['top' => '9', 'bottom' => '9', 'left' => '15', 'right' => '15', 'unit' => 'px']],
            ],

            'cartTextColor' => [
                'type' => 'string',
                'default' => '#fff',
            ],

            'cartBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 1, 'type' => 'color', 'color' => '#333'],
            ],

            'cartButtonBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#dfb0a8',
                    'type' => 'solid'
                ],
            ],

            'cartButtonRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => '2', 'unit' => 'px'],
            ],

            'cartButtonBoxShadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4'
                ],
            ],

            'cartTextHoverColor' => [
                'type' => 'string',
                'default' => '#fff',
            ],

            'cartHoverBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
            ],

            'cartButtonHoverBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#dfb0a8',
                    'type' => 'solid'
                ],
            ],

            'cartButtonHoverBoxShadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4'
                ],
            ],


            //Image Style
            'showImgOverlay' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'imgHeight' => [
                'type' => 'object',
                'default' => (object)['lg' => '350', 'unit' => 'px'],
            ],

            'imgWidth' => [
                'type' => 'object',
                'default' => (object)['lg' => '', 'unit' => '%'],
            ],

            'showSaleBadge' => [
                'type' => 'boolean',
                'default' => true,
            ],

            'imgBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                    'type' => 'solid'
                ],
            ],

            'imgRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => 0, 'unit' => 'px'],
            ],

            'imgShadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4'
                ],
            ],

            'imgHoverBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                    'type' => 'solid'
                ],
            ],

            'imgHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' => 0, 'unit' => 'px'],
            ],

            'imgHoverShadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4'
                ],
            ],


            //--------------------------
            //      Sales Setting/Style
            //--------------------------
            'saleText' => [
                'type' => 'string',
                'default' => 'Sale!'
            ],
            'salePosition' => [
                'type' => 'string',
                'default' => 'topLeft',
            ],
            'saleDesign' => [
                'type' => 'string',
                'default' => 'digit',
            ],
            'saleStyle' => [
                'type' => 'string',
                'default' => 'shape1',
            ],
            'salesColor' => [
                'type' => 'string',
                'default' => '#fff',
            ],
            'salesBgColor' => [
                'type' => 'string',
                'default' => '#31b54e',
            ],
            'salesTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'11', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'20', 'unit'=>'px'],'decoration'=>'none','transform' => 'uppercase','family'=>'','weight'=>''],
            ],
            'salesPadding' => [
                'type' => 'object',
                'default' => (object)['lg'=>(object)['top'=>4,'bottom'=>4,'left'=>8,'right'=>8, 'unit'=>'px']],
            ],
            'salesRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'2', 'unit' =>'px'],
            ],


            //Arrow style
            'arrowStyle' => [
                'type' => 'string',
                'default' => 'leftAngle2#rightAngle2',
            ],

            'arrowSize' => [
                'type' => 'object',
                'default' => (object)['lg' => '30', 'unit' => 'px'],
            ],

            'arrowWidth' => [
                'type' => 'object',
                'default' => (object)['lg' => '45', 'unit' => 'px'],
            ],

            'arrowHeight' => [
                'type' => 'object',
                'default' => (object)['lg' => '40', 'unit' => 'px'],
            ],

            'arrowVertical' => [
                'type' => 'object',
                'default' => (object)['lg' => ''],
            ],

            'leftArrowSpace' => [
                'type' => 'object',
                'default' => (object)['lg' => '', 'unit' => 'px'],
            ],

            'rightArrowSpace' => [
                'type' => 'object',
                'default' => (object)['lg' => '', 'unit' => 'px'],
            ],

            'arrowColor' => [
                'type' => 'string',
                'default' => '#ffffff',
            ],

            'arrowHoverColor' => [
                'type' => 'string',
                'default' => '#fff',
            ],

            'arrowBg' => [
                'type' => 'string',
                'default' => 'rgba(0,0,0,0.22)',
            ],

            'arrowHoverBg' => [
                'type' => 'string',
                'default' => '#ff5845',
            ],

            'arrowBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                    'type' => 'solid'
                ],
            ],

            'arrowHoverBorder' => [
                'type' => 'object',
                'default' => (object)[
                    'openBorder' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4',
                    'type' => 'solid'
                ],
            ],

            'arrowRadius' => [
                'type' => 'object',
                'default' => (object)[
                    'lg' => (object)['top' => '0', 'bottom' => '0', 'left' => '0', 'right' => '0', 'unit' => 'px']
                ],
            ],

            'arrowHoverRadius' => [
                'type' => 'object',
                'default' => (object)[
                    'lg' => (object)['top' => '0', 'bottom' => '0', 'left' => '0', 'right' => '0', 'unit' => 'px']
                ],
            ],

            'arrowShadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4'
                ],
            ],

            'arrowHoverShadow' => [
                'type' => 'object',
                'default' => (object)[
                    'openShadow' => 0,
                    'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],
                    'color' => '#009fd4'
                ],
            ],


            //Dot Style
            "dotSpace" => [
                "type" => "object",
                "default" => (object)["lg" => "4", "unit" => "px"],
            ],
            "dotVertical" => [
                "type" => "object",
                "default" => (object)["lg" => "-50", "unit" => "px"],
            ],
            "dotHorizontal" => [
                "type" => "object",
                "default" => (object)["lg" => ""],
            ],
            "dotWidth" => [
                "type" => "object",
                "default" => (object)["lg" => "10", "unit" => "px"],
            ],
            "dotHeight" => [
                "type" => "object",
                "default" => (object)["lg" => "10", "unit" => "px"],
            ],
            "dotHoverWidth" => [
                "type" => "object",
                "default" => (object)["lg" => "16", "unit" => "px"],
            ],
            "dotHoverHeight" => [
                "type" => "object",
                "default" => (object)["lg" => "16", "unit" => "px"],
            ],
            "dotBg" => [
                "type" => "string",
                "default" => "#f5f5f5",
            ],
            "dotHoverBg" => [
                "type" => "string",
                "default" => "#000",
            ],
            "dotBorder" => [
                "type" => "object",
                "default" => (object)[
                    "openBorder" => 0,
                    "width" => (object)["top" => 1, "right" => 1, "bottom" => 1, "left" => 1],
                    "color" => "#009fd4",
                    "type" => "solid",
                ],
            ],
            "dotHoverBorder" => [
                "type" => "object",
                "default" => (object)[
                    "openBorder" => 0,
                    "width" => (object)["top" => 1, "right" => 1, "bottom" => 1, "left" => 1],
                    "color" => "#009fd4",
                    "type" => "solid",
                ],
            ],
            "dotRadius" => [
                "type" => "object",
                "default" => (object)[
                    "lg" => (object)["top" => "50", "bottom" => "50", "left" => "50", "right" => "50", "unit" => "px"],
                ],
            ],
            "dotHoverRadius" => [
                "type" => "object",
                "default" => (object)[
                    "lg" => (object)["top" => "50", "bottom" => "50", "left" => "50", "right" => "50", "unit" => "px"],
                ],
            ],
            "dotShadow" => [
                "type" => "object",
                "default" => (object)[
                    "openShadow" => 0,
                    "width" => (object)["top" => 1, "right" => 1, "bottom" => 1, "left" => 1],
                    "color" => "#009fd4",
                ],
            ],
            "dotHoverShadow" => [
                "type" => "object",
                "default" => (object)[
                    "openShadow" => 0,
                    "width" => (object)["top" => 1, "right" => 1, "bottom" => 1, "left" => 1],
                    "color" => "#009fd4",
                ],
            ],


            //--------------------------
            //  Wrapper Style
            //--------------------------
            'wrapBg' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper'
                    ],
                ],
            ],
            'wrapBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper'
                    ],
                ],
            ],
            'wrapShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper'
                    ],
                ],
            ],
            'wrapRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { border-radius:{{wrapRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverBackground' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#ff5845'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover { border-radius:{{wrapHoverRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { margin:{{wrapMargin}}; }'
                    ],
                ],
            ],
            'wrapOuterPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { padding:{{wrapOuterPadding}}; }'
                    ],
                ],
            ],
            'advanceId' => [
                'type' => 'string',
                'default' => '',
            ],
            'advanceZindex' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {z-index:{{advanceZindex}};}'
                    ],
                ],
            ],
            'hideExtraLarge' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'hideDesktop' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'hideTablet' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'hideMobile' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'advanceCss' => [
                'type' => 'string',
                'default' => '',
                'style' => [(object)['selector' => '']],
            ]
        );
        
        if ($default) {
            $temp = array();
            foreach ($attributes as $key => $value) {
                if (isset($value['default'])) {
                    $temp[$key] = $value['default'];
                }
            }
            return $temp;
        } else {
            return $attributes;
        }
    }

    public function register() {
        register_block_type( 'product-blocks/product-slider',
            array(
                'editor_script' => 'wopb-blocks-editor-script',
                'editor_style'  => 'wopb-blocks-editor-css',
                'title' => __('Product Slider', 'product-blocks'),
                'render_callback' =>  array($this, 'content')
            )
        );
    }

    /**
     * This
     * @return terminal
     */
    public function content($attr, $noAjax = false) {
        $block_key = 'product_slider';
        $blocks_settings = wopb_function()->get_setting($block_key);
        if(wopb_function()->get_setting() == '' || !array_key_exists($block_key, wopb_function()->get_setting()) || $blocks_settings == 'yes') {
            $default = $this->get_attributes(true);
            $attr = wp_parse_args($attr,$default);
            $block_name = 'product-slider';

            $wraper_before = $wraper_after = $post_loop = '';
            $recent_posts = new \WP_Query( wopb_function()->get_query( $attr ) );

            $slider_attr = wc_implode_html_attributes(
                array(
                    'data-slidestoshow'  => wopb_function()->slider_responsive_split($attr['slidesToShow']),
                    'data-autoplay'      => esc_attr($attr['autoPlay']),
                    'data-slidespeed'    => esc_attr($attr['slideSpeed']),
                    'data-showdots'      => esc_attr($attr['showDots']),
                    'data-showarrows'    => esc_attr($attr['showArrows']),
                    'data-fade'          => $attr['slideAnimation'] == 'fade' ? true : false,
                )
            );

            if ($recent_posts->have_posts()) {
                ob_start();
                echo '<div '.($attr['advanceId']?'id="'.esc_attr($attr['advanceId']).'" ':'').' class="wp-block-product-blocks-'.esc_attr($block_name).' wopb-block-'.esc_attr($attr["blockId"]).' '.(isset($attr["className"])?esc_attr($attr["className"]):'') . (isset($attr["align"])? ' align' .esc_attr($attr["align"]):'') . ' wopb-product-slider-block">';
    ?>
                        <div class="wopb-block-wrapper">
                            <div class="wopb-slider-section">
                                <div class="wopb-product-blocks-slide" <?php echo wp_kses_post($slider_attr)?>>
                                    <?php
                                        $idx = $noAjax ? 1 : 0;
                                        while ( $recent_posts->have_posts() ): $recent_posts->the_post();
                                            include WOPB_PATH.'blocks/template/data.php';
                                            if($product) {
                                    ?>
                                                <div class="wopb-block-item">
                                                    <div class="wopb-slide-wrap">
                                                        <?php
                                                            echo $this->content_section($product, $attr);
                                                            if($attr['showImage']) {
                                                                echo $this->image_section($product, $_discount, $attr);
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                            $idx ++;
                                        endwhile;
                                    ?>
                                </div>

                                <?php
                                    if ($attr['showArrows']) {
                                        $nav = explode('#', $attr['arrowStyle']);
                                ?>
                                    <div class="wopb-slick-nav" style="display:none">
                                        <div class="wopb-slick-prev">
                                            <div class="slick-arrow slick-prev">
                                                <?php echo wopb_function()->svg_icon($nav[0]) ?>
                                            </div>
                                        </div>
                                        <div class="wopb-slick-next">
                                            <div class="slick-arrow slick-next">
                                                <?php echo wopb_function()->svg_icon($nav[1]) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
    <?php
                return ob_get_clean();
            }
        }
    }

    public function content_section($product, $attr) {
?>
        <div class="wopb-content-section">
            <?php
                if(!$attr['taxonomyUnderTitle']) {
                    echo $this->taxonomyContent($product, $attr);
                }
                if($attr['showTitle']) {
            ?>
                    <<?php esc_attr_e($attr['titleTag']); ?> class="wopb-product-title <?php esc_attr_e($attr['titleHoverEffect'] == 'none' ? '' :  'wopb-title-' . $attr['titleHoverEffect']) ?>">
                    <a href="<?php echo esc_url(get_permalink($product->get_id())) ?>">
                        <?php _e($product->get_title(), 'product-blocks') ?>
                    </a>
                    </<?php esc_attr_e($attr['titleTag']) ?>>
            <?php
                }
                if($attr['taxonomyUnderTitle']) {
                    echo $this->taxonomyContent($product, $attr);
                }
                if($attr['priceOverDescription']) {
                    echo $this->priceContent($product, $attr);
                }
                if($attr['showDescription']) {
            ?>
                <div class="wopb-product-excerpt">
                    <?php
                        $product_excerpt = strlen($product->get_short_description()) > $attr['descriptionLimit'] ? substr($product->get_short_description(), 0, $attr['descriptionLimit']) . '...' : $product->get_short_description();
                        _e($product_excerpt);
                    ?>
                </div>
            <?php
                }
                if(!$attr['priceOverDescription']) {
                    echo $this->priceContent($product, $attr);
                }
                echo $this->cartContent($product, $attr);
            ?>
        </div>

<?php
    }

    public function image_section($product, $_discount, $attr) {
        $shapeClass = "";
        $shape = "";
        if($attr['saleStyle'] === "shape1") {
            $shapeClass = "wopb-onsale-shape";
            switch ($attr['saleStyle']) {
                case "shape1":
                    $shape = wopb_function()->svg_icon('saleShape1');
                    break;
                default:
                    break;
            }
        }
?>
        <div class="wopb-image-section">
             <span class="wopb-product-image">
                <?php
                    if($attr['showImgOverlay']) {
                        echo '<div class="wopb-image-overlay"></div>';
                    }
                    if($attr['showSaleBadge'] && $product->is_on_sale() && $_discount) {
                ?>
                    <div class="wopb-onsale-hot <?php echo esc_attr($shapeClass); ?>">
                        <?php
                            if($shape !== '') {
                        ?>
                                <span class="wopb-sale-shape">
                                    <?php
                                        echo $shape;
                                        echo $this->saleStyle($_discount, $attr);
                                    ?>
                                </span>
                        <?php
                            }else {
                                echo $this->saleStyle($_discount, $attr);
                            }
                        ?>
                    </div>
                <?php
                    }
                    if($product->get_image_id() && wp_get_attachment_image_src($product->get_image_id(), 'large')[0]) {
                ?>
                        <a href="<?php echo esc_url(get_permalink($product->get_id())) ?>">
                            <img class="wopb-block-image" alt="<?php esc_attr_e($product->get_title()); ?>" src="<?php echo esc_url(wp_get_attachment_image_src($product->get_image_id(), 'large')[0]) ?>"/>
                        </a>
                <?php }else { ?>
                        <a href="<?php echo esc_url(get_permalink($product->get_id())) ?>">
                            <img class="wopb-block-image wopb-fallback-image" alt="<?php esc_attr_e($product->get_title()); ?>" src="<?php echo WOPB_URL . 'assets/img/wopb-fallback-img.png' ?>"/>
                        </a>
                <?php
                    }
                ?>
             </span>
        </div>
<?php
    }

    public function saleStyle($_discount, $attr) {
?>
        <span class="wopb-onsale wopb-onsale-<?php esc_attr_e($attr["saleStyle"]); ?>">
            <?php
                if($attr["saleDesign"] == 'digit') {
                    esc_html_e('-'.$_discount);
                }elseif($attr["saleDesign"] == 'text') {
                    isset($attr["saleText"]) ? esc_html_e($attr["saleText"]) : esc_html__('Sale!', 'product-blocks');
                }elseif($attr["saleDesign"] == 'textDigit') {
                    echo esc_html('-'.$_discount) . esc_html__(' Off', 'product-blocks');
                }
            ?>
        </span>
<?php
    }

    public function taxonomyContent($product, $attr) {
        if($attr['showTaxonomy']) {
?>
            <div class="wopb-product-taxonomies">
                <?php
                    $categories = get_the_terms($product->get_id(), 'product_cat');
                    if($attr['taxonomyType'] == 'product_cat' && $categories) {
                        foreach ($categories as $category) {
                ?>
                            <a href="<?php echo esc_url(get_term_link( $category->term_id )) ?>" class="wopb-taxonomy"><?php _e($category->name, 'product-blocks') ?></a>
                <?php
                        }
                    }
                    $tags = get_the_terms($product->get_id(), 'product_tag');
                    if($attr['taxonomyType'] == 'product_tag' && $tags) {
                        foreach ($tags as $tag) {
                ?>
                            <a href="<?php echo esc_url(get_term_link( $tag->term_id )) ?>" class="wopb-taxonomy"><?php _e($tag->name, 'product-blocks') ?></a>
                <?php } } ?>
            </div>

<?php

        }
    }

    public function priceContent($product, $attr) {
        if($attr['showPrice'] && $product->get_price_html()) {
?>
            <div class="wopb-product-price-section">
                <span class="wopb-product-price">
                    <?php
                        if($attr['showPriceLabel'] && $attr['priceLabelText']) {
                    ?>
                        <span class="wopb-price-label"><?php esc_html_e($attr['priceLabelText']); ?></span>
                    <?php
                        }
                    ?>
                    <span class="wopb-prices wopb-<?php echo $product->get_type()?>-price">
                        <?php echo $product->get_price_html(); ?>
                    </span>
                </span>
            </div>
<?php
        }
    }

    public function cartContent($product, $attr) {
        if($attr['showCart']) {
?>
            <div class="wopb-product-cart-section wopb-cart-action">
                <form action="#" class="cart">
                    <?php if($attr['showQty'] && $product->is_type('simple')) { ?>
                        <div class="quantity">
                            <?php if($attr['showPlusMinus'] && $attr['plusMinusPosition'] == 'both') { ?>
                                <span class="wopb-cart-minus wopb-add-to-cart-minus"><?php echo wopb_function()->svg_icon('minus'); ?></span>
                        <?php } ?>
                            <input type="number" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputMode="numeric"/>
                        <?php if($attr['showPlusMinus'] && $attr['plusMinusPosition'] == 'both') { ?>
                            <span class="wopb-cart-plus wopb-add-to-cart-plus"><?php echo wopb_function()->svg_icon('plus'); ?></span>
                        <?php
                            }
                            if($attr['showPlusMinus'] && ($attr['plusMinusPosition'] == 'left' || $attr['plusMinusPosition'] == 'right')) {
                        ?>
                            <span class="wopb-cart-plus-minus-icon">
                                <?php echo $this->plusMinusContent(); ?>
                            </span>
                        <?php
                            }
                        ?>
                        </div>
                    <?php
                        }
                        $cart_btn_class = '';
                        $cart_text = $product->add_to_cart_text();
                        if($product->is_type('simple')) {
                            $cart_btn_class = 'single_add_to_cart_button ajax_add_to_cart';
                            if($attr['cartText'])
                                $cart_text = $attr['cartText'] ? $attr['cartText'] : $cart_text;
                        }
                    ?>
                            <a href="<?php echo esc_url($product->add_to_cart_url()) ?>" class="wopb-product-cart <?php echo $cart_btn_class ?>" data-postid="<?php esc_attr_e($product->get_id()) ?>"><?php _e($cart_text, 'product-blocks')?></a>
                </form>
            </div>
<?php
        }
    }

    public function plusMinusContent() {
?>
        <span class="wopb-cart-plus wopb-add-to-cart-plus"><?php echo wopb_function()->svg_icon('plus'); ?></span>
        <span class="wopb-cart-minus wopb-add-to-cart-minus"><?php echo wopb_function()->svg_icon('minus'); ?></span>
<?php
    }

}