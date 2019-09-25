<?php
declare(strict_types=1);

namespace Ecolos\SyliusTaricPlugin\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;

class ProductTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taric', TextType::class, [
                'label' => 'TARIC',
                "attr" => [
                    "maxlength" => "8",
                    "minlength" => "11",
                    "pattern" => "?<=\s)\d{8,11}(?=\s)",
                    "spellcheck" => false,
                    "autocorrect" => false //firefox only
                ],
                "constraints" => [
                    new Length([
                        "min" => 8,
                        "max" => 11,
                        "groups" => ["ecolos_sylius_taric_plugin_product", "sylius"],
                    ]),
                ],
                "validation_groups" => ["ecolos_sylius_taric_plugin_product"],
                "required" => false
            ]);
    }

    /**
     * @inheritdoc
     */
    static public function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
