<?php

namespace digitalRootSrc;

use digitalRootSrc\digitalRoot;

class digitalRootBuilder
{
    /**
     * Returns single digitalRoot instance.
     *
     * @param  mixed $input
     * @param  mixed $alternative_values
     * @return digitalRoot
     */
    private static function buildSingleInstance(string $input, array $alternative_values = null): digitalRoot
    {
        return (new digitalRoot($input, $alternative_values));
    }

    /**
     * getDigitalRoot
     *
     * @param  mixed $input
     * @param  mixed $alternative_values
     * @return array
     */
    public static function getDigitalRoot(string $input, array $alternative_values = null): array
    {
        $digitalRootModel = digitalRootBuilder::buildSingleInstance($input, $alternative_values);

        $digitalRootModel->shortCalculation();

        return [
            'client_input' => $digitalRootModel->getOrigInput(),
            'digital_root' => $digitalRootModel->getDigRoot()
        ];
    }

    /**
     * getDigitalRootCompleteCalculation
     *
     * @param  mixed $input
     * @param  mixed $alternative_values
     * @return array
     */
    public static function getDigitalRootCompleteCalculation(string $input, array $alternative_values = null): array
    {
        $digitalRootModel = digitalRootBuilder::buildSingleInstance($input, $alternative_values);

        $digitalRootModel->longCalculation();

        return [
            'client_input' => $digitalRootModel->getOrigInput(),
            'digital_root' => $digitalRootModel->getDigRoot(),
            'digital_root_from' => $digitalRootModel->getDigitalRootFrom(),
            'full_calculation' => $digitalRootModel->getDigRootFullCalculation(),
            'single_digit_summaries' => $digitalRootModel->getSingleDigitSummaries(),
            'double_digit_summaries' => $digitalRootModel->getDoubleDigitSummaries(),
            'double_digit_summaries_separated_digits' => $digitalRootModel->getDigRootddsSeparated(),
            'double_digit_summaries_separated_digits_summaries' => $digitalRootModel->getDigRootddssSummaries(),
        ];
    }

    /**
     * getdigitalRootBulk
     *
     * @param  mixed $values
     * @param  mixed $alternative_values
     * @return array
     */
    public static function getdigitalRootBulk(array $values, array $alternative_values = null): array
    {
        $returnData = [];

        foreach ($values as $value) {
            $digitalRootModel = digitalRootBuilder::buildSingleInstance($value, $alternative_values);
            $digitalRootModel->shortCalculation();
            $returnData[$value] = $digitalRootModel->getDigRoot();
        }

        return $returnData;
    }
}
