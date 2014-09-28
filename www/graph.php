
<?php 

include "libchart/classes/libchart.php";


function grafico_doppio ($v,$nomegrafico,$titolo,$i,$ii,$init) {
//	$chart = new VerticalBarChart(600,200);
//	$chart = new VerticalBarChart();
	$chart = new LineChart();
	$dataSet = new XYDataSet();
	$x=$init;
	foreach($v as $e){
		$dataSet->addPoint(new Point(sprintf("%02d",$x),$e[$i]+0));
		$x=$x+1;
	}
	$dataSet1 = new XYDataSet();
	$x=$init;
	foreach($v as $e){
		$dataSet1->addPoint(new Point(sprintf("%02d",$x),$e[$ii]+0));
		$x=$x+1;
	}
	$dataSet3 = new XYSeriesDataSet();
	$dataSet3->addSerie("Vento Medio", $dataSet);
	$dataSet3->addSerie("Raffiche", $dataSet1);
	$chart->setDataSet($dataSet3);
	$chart->setTitle($titolo);
	$chart->render($nomegrafico);
}

function grafico ($v,$nomegraph,$titolo,$x){
#	$chart = new VerticalBarChart(800,200);
	$chart = new LineChart(700,245);
#	$chart->getPlot()->getPalette()->setAxisColor(array(new Color(255, 0,0)));
	$dataSet = new XYDataSet();
//	$x=$init;
	$ii=0;
	$serie=array();
//	echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br>";
	foreach ($v as $s){
//		var_dump($s);
		$serie[$ii] = new XYDataSet();
		$nome_serie[]=$s[0];
//		echo $s[0]."<br>";
//		unset($s[0]);
		$flag=True;
		$i=0;
		foreach($s as $e){
			if(!$flag){
//			var_dump($e);
				$serie[$ii]->addPoint(new Point(sprintf("%02d",$x[$i]),$e+0));
				$i=$i+1;
			}
			$flag=False;
		}
		$ii=$ii+1;
	}
	$ii=0;
	$dataSet = new XYSeriesDataSet();
	foreach ($serie as $ds){
		$dataSet->addSerie($nome_serie[$ii], $ds);
		$ii=$ii+1;
	}
#	$chart->axis->setUpperBound(400);
	$chart->setDataSet($dataSet);
	$chart->setTitle($titolo);
	$chart->render($nomegraph);
}
?>
