<?php

declare(strict_types=1);

namespace Stopka\NetteFormsCheckboxComponent;

use Nette\ComponentModel\ArrayAccess;

trait CheckboxControlContainerTrait
{
    use ArrayAccess;

    /**
     * Adds check box control to the form.
     * @param string
     * @param string|object|null
     * @return CheckboxControl
     */
    public function addExtendedCheckbox(
        string $name,
        $label = null
    ): CheckboxControl {
        return $this[$name] = new CheckboxControl($label);
    }
}
