<?php

namespace Datatheke\Bundle\PagerBundle\DataGrid;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Datatheke\Bundle\PagerBundle\Pager\WebPager;

class WebDataGrid extends DataGrid
{
    protected $options;

    public function __construct(WebPager $pager, array $columns = null, array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->setDefaultOptions($resolver);
        $this->options = $resolver->resolve($options);

        parent::__construct($pager, $columns);
    }

    protected function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            // 'pk_param'  => 'id',
            // 'pk_column' => 'id'
            )
        );
    }

    public function hasOption($option)
    {
        return array_key_exists($option, $this->options);
    }

    public function getOption($option)
    {
        if (!$this->hasOption($option)) {
            throw new \InvalidArgumentException(sprintf('The "%s" option does not exist.', $option));
        }

        return $this->options[$option];
    }

    public function handleRequest(Request $request)
    {
        $this->initialize();
        $this->pager->handleRequest($request);
    }
}
