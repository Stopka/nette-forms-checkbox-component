# nette-forms-checkbox-component
CheckboxControl with ability to set caption in label part as usual for other form controls.

## Usage
Labels are rendered next to the input as in usual checkbox,
captions are renderd in "label" part of the form (usually on the left)

```php
$form = new Form();
$form['checkbox'] = (new CheckboxControl('Some label'))->setCaption('Some caption');
```

Optionaly add trait to your form:
```php
class MyForm extends Form{
    use CheckboxControlContainerTrait;

}

$form = new MyForm();
$form->addExtendedCheckbox('checkbox', 'Some label')
    ->setCaption('Some caption');
```
