<?php

namespace App\Action\Work;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Db\Adapter\Adapter;

class GetWorkDetailsFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = ($container->has(TemplateRendererInterface::class))
            ? $container->get(TemplateRendererInterface::class)
            : null;
        $adapter = $container->get(Adapter::class);
        return new GetWorkDetailsAction($router, $template, $adapter);
        //return new \App\Action\SimpleRenderAction('app::work::get_work_details', $router, $template, $adapter);
    }
}