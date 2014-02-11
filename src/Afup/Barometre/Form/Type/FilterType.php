<?php

namespace Afup\Barometre\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Afup\Barometre\Filter\FilterCollection;

/**
 * Filter Type
 */
class FilterType extends AbstractType
{
    /**
     * @var FilterCollection
     */
    private $filterCollection;

    /**
     * @param FilterCollection $filterCollection
     */
    public function __construct(FilterCollection $filterCollection)
    {
        $this->filterCollection = $filterCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->filterCollection->buildForm($builder);

        $builder
            ->setMethod('GET')
            ->add('submit', 'submit', ['label' => 'filter.submit']);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['csrf_protection' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'filter';
    }
}