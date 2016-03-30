<?php
namespace ModForm\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class PageFilter extends InputFilter
{
    protected $category;
    public function __construct(Array $category = array())
    {
        $this->category = $category;

        $titulo = new Input('title');
        $titulo->setRequired(true)
            ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $titulo->getValidatorChain()->attach(new NotEmpty());
        $this->add($titulo);

        $descticao = new Input('dword');
        $descticao->setRequired(false)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $this->add($descticao);

        $texto = new Input('fulltext');
        $texto->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $texto->getValidatorChain()->attach(new NotEmpty());
        $this->add($texto);

        $inArray = new InArray();
        $inArray->setOptions(array('haystack' => $this->haystack($this->category)));

        $categoria = new Input('category');
        $categoria->setRequired(true)
            ->getFilterChain()->attach(new StripTags())->attach(new StringTrim());
        $categoria->getValidatorChain()->attach($inArray);
        $this->add($categoria);
    }

    /**
     * @param array $haystack
     *
     * @return array
     */
    public function haystack(Array $haystack = array())
    {
        $array = array();
        foreach($haystack as $value){
            if ($value)
                $array[$value['value']] = $value['label'];
        }


        return array_keys($array);
    }

}