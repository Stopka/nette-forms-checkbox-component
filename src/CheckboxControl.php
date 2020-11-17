<?php

declare(strict_types=1);

namespace Stopka\NetteFormsCheckboxComponent;

use Nette\Forms\Controls\Checkbox;
use Nette\Utils\Html;
use Nette\Utils\IHtmlString;

class CheckboxControl extends Checkbox
{
    /** @var string|object|null */
    private $realCaption;

    /** @var Html<mixed> */
    private Html $labelPart;

    /**
     * CheckboxControl constructor.
     * @param string|object|null $label
     */
    public function __construct($label = null)
    {
        parent::__construct($label);
        $this->labelPart = Html::el('label');
    }

    /**
     * @return Html<mixed>
     */
    public function getControl(): Html
    {
        return Html::el()
            ->setHtml(parent::getLabelPart()->insert(0, parent::getControlPart()));
    }

    /**
     * @return Html<mixed>
     */
    public function getControlPart(): Html
    {
        return $this->getControl();
    }

    /**
     * @param string|object|null $caption
     * @return $this
     */
    public function setCaption($caption = null): self
    {
        $this->realCaption = $caption;

        return $this;
    }

    /**
     * Generates label's HTML element.
     * @param string|object|null $caption
     * @return Html<mixed>
     */
    public function getLabelPart($caption = null): Html
    {
        $label = clone $this->labelPart;
        $label->for = $this->getHtmlId();
        $caption = $caption ?? $this->realCaption;
        $form = $this->getForm();
        $translator = null !== $form ? $form->getTranslator() : null;
        $label->setText(
            null !== $translator && !$caption instanceof IHtmlString
                ? $translator->translate($caption)
                : (string)$caption
        );

        return $label;
    }
}
