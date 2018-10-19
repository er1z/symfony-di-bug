<?php
namespace App\TestBundle;


use App\TestBundle\DependencyInjection\TestBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppTestBundle extends Bundle
{
    /**
     * @return string
     */
    public function getNamespace()
    {
        return 'App\\TestBundle';
    }

    public function getContainerExtension()
    {
        if (!isset($this->extension)) {
            $this->extension = $this->createContainerExtension();
        }

        return $this->extension;
    }

    protected function createContainerExtension()
    {
        return new TestBundleExtension();
    }

    /**
     * @return string
     */
    protected function getContainerExtensionClass()
    {
        return TestBundleExtension::class;
    }
}
