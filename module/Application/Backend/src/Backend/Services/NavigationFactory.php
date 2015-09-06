<?php

/*
 * Copyright (C) 2015 hieun
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Application\Backend\Services;
use Zend\Navigation\Service\DefaultNavigationFactory;
/**
 * Description of NavigationFactory
 *
 * @author hieun
 */
class NavigationFactory extends DefaultNavigationFactory{
    //put your code here
    protected function getName() {
        return 'backend';
    }
    protected function getPages(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        
       return parent::getPages($serviceLocator);
    }
}
