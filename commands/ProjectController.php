<?php

namespace app\commands;

use Yii;

class ProjectController extends \yii\console\Controller
{

    public function actionIndex()
    {
        $excel = '/home/vagrant/Code/tmp/project.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excel);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Html');
        $writer->save("/home/vagrant/Code/tmp/project.html");

    }
}
