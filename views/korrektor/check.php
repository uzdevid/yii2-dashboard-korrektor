<?php

use yii\web\View;

/**
 * @var View $this
 * @var uzdevid\korrektor\Correct $corrector
 */
?>

<?php $corrector->isCorrect(); ?>
<?php echo $corrector->highlight(); ?>