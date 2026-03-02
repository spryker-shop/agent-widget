<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\AgentWidget;

use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\AgentWidget\Dependency\Client\AgentWidgetToAgentClientInterface;
use SprykerShop\Yves\AgentWidget\Dependency\Client\AgentWidgetToCustomerClientInterface;
use SprykerShop\Yves\AgentWidget\Validator\CustomerAutocompleteValidator;
use SprykerShop\Yves\AgentWidget\Validator\CustomerAutocompleteValidatorInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AgentWidgetFactory extends AbstractFactory
{
    public function getAgentClient(): AgentWidgetToAgentClientInterface
    {
        return $this->getProvidedDependency(AgentWidgetDependencyProvider::CLIENT_AGENT);
    }

    public function getCustomerClient(): AgentWidgetToCustomerClientInterface
    {
        return $this->getProvidedDependency(AgentWidgetDependencyProvider::CLIENT_CUSTOMER);
    }

    public function createCustomerAutocompleteValidator(): CustomerAutocompleteValidatorInterface
    {
        return new CustomerAutocompleteValidator(
            $this->getValidator(),
        );
    }

    public function getValidator(): ValidatorInterface
    {
        return Validation::createValidator();
    }
}
