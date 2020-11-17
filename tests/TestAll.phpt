<?php

declare(strict_types=1);

namespace Stopka\NetteFormsHtmlComponent\Tests;

// phpcs:ignore
require __DIR__ . '/../vendor/autoload.php';

use Nette\Forms\Form;
use Stopka\NetteFormsCheckboxComponent\CheckboxControlContainerTrait;
use Tester\Assert;
use Tester\Environment;

const NAME = 'checkbox';
const CAPTION = 'Caption';
const LABEL = 'Label';


Environment::setup();

$container = new class () extends Form {
    // phpcs:ignore
    use CheckboxControlContainerTrait;
};

$control = $container->addExtendedCheckbox(NAME, LABEL)
    ->setCaption(CAPTION);

Assert::same($container[NAME], $control);
Assert::same(
    '<label for="frm-checkbox">Caption</label>',
    (string)$control->getLabelPart()
);
Assert::same(
    '<label for="frm-checkbox"><input type="checkbox" name="checkbox" id="frm-checkbox">Label</label>',
    (string)$control->getControlPart()
);
