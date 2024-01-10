<?php

namespace CSlant\LaraGenAdv\Helpers;

use CSlant\LaraGenAdv\Exceptions\LaravelGeneratorAdvancedException;

class ConfigHelper
{
    /**
     * Get config.
     *
     * @param  string|null  $generatorName
     *
     * @return array
     *
     * @throws LaravelGeneratorAdvancedException
     */
    public function generatorConfig(?string $generatorName = null): array
    {
        if ($generatorName === null) {
            $generatorName = config('lara-gen-adv.default');
        }

        $defaults = config('lara-gen-adv.defaults', []);
        $generators = config('lara-gen-adv.generators', []);

        if (!isset($generators[$generatorName])) {
            throw new LaravelGeneratorAdvancedException('Generator name not found');
        }

        return $this->mergeConfig($defaults, $generators[$generatorName]);
    }

    /**
     * Merge config.
     *
     * @param  array  $defaults
     * @param  array  $generatorName
     * @return array
     */
    private function mergeConfig(array $defaults, array $generatorName): array
    {
        $merged = $defaults;

        foreach ($generatorName as $key => &$value) {
            if (isset($defaults[$key])
                && $this->isAssociativeArray($defaults[$key])
                && $this->isAssociativeArray($value)
            ) {
                $merged[$key] = $this->mergeConfig($defaults[$key], $value);

                continue;
            }

            $merged[$key] = $value;
        }

        return $merged;
    }

    /**
     * Check is associative key array.
     *
     * @param  mixed  $key
     * @return bool
     */
    private function isAssociativeArray(mixed $key): bool
    {
        return is_array($key) && count(array_filter(array_keys($key), 'is_string')) > 0;
    }
}
