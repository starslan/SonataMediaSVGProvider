 protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('cover', MediaType::class, [
                'label' => 'Обложка',
                'context' => 'default',
                'provider' => 'admin.provider.image',
            ])
        ;

        $options = [
            'context' => 'default',
            'provider' => 'admin.provider.image',
        ];

        $pool = $this->getConfigurationPool()->getContainer()->get('sonata.media.pool');
        $transformer = new SVGTransformer($pool,  $options);
        $logger = $this->getConfigurationPool()->getContainer()->get('monolog.logger.db');
        $transformer->setLogger($logger);
        $formMapper->get('cover')->addModelTransformer($transformer);
    }
