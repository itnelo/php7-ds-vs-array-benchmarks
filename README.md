# Php array vs Ds\PriorityQueue from ext-ds

#### разница

| Кол-во точек | Php array | Ds\PriorityQueue | ds polyfill :trollface:
| :--- | :--- | :--- | :--- |
| 10 | 0.1049 ms | 0.067 ms | 2.20299 ms |
| 100 | 1.11103 ms | 0.58699 ms | 3.84903 ms |
| 1000 | 24.56594 ms | 2.13122 ms | 41.47291 ms |
| 10000 | 260.58507 ms | 22.32599 ms | 471.00091 ms |
| 100000 | 3270.90788 ms | 235.23211 ms | 5900.16007 ms |

#### Php array

```
$ php bin/benchmark PhpArray 10000
Running 'PhpArrayVsDsBenchmarks\Benchmark\PhpArray'
Objects count: 10000

254.776 ms
```

#### Ds\PriorityQueue

```
$ php bin/benchmark DsPriorityQueue 10000
Running 'PhpArrayVsDsBenchmarks\Benchmark\DsPriorityQueue'
Objects count: 10000

21.84916 ms
```

#### tested on

php

```
$ php -v

PHP 7.3.11-1+ubuntu16.04.1+deb.sury.org+1 (cli) (built: Oct 24 2019 18:23:06) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.11, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.3.11-1+ubuntu16.04.1+deb.sury.org+1, Copyright (c) 1999-2018, by Zend Technologies
    with Xdebug v2.7.2, Copyright (c) 2002-2019, by Derick Rethans
```

ext version

```
$ php --re ds | head -1

Extension [ <persistent> extension #35 ds version 1.2.9 ] {
```

polyfill version

```
$ composer show php-ds/php-ds | grep 'versions'

versions : * v1.2.0
```

cpu

```
$ lscpu

Architecture:          x86_64
CPU op-mode(s):        32-bit, 64-bit
Byte Order:            Little Endian
CPU(s):                8
On-line CPU(s) list:   0-7
Thread(s) per core:    2
Core(s) per socket:    4
Socket(s):             1
NUMA node(s):          1
Vendor ID:             GenuineIntel
CPU family:            6
Model:                 158
Model name:            Intel(R) Core(TM) i7-7700HQ CPU @ 2.80GHz
Stepping:              9
CPU MHz:               900.033
CPU max MHz:           3800,0000
CPU min MHz:           800,0000
BogoMIPS:              5616.00
Virtualization:        VT-x
L1d cache:             32K
L1i cache:             32K
L2 cache:              256K
L3 cache:              6144K
NUMA node0 CPU(s):     0-7
Flags:                 fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc art arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc cpuid aperfmperf tsc_known_freq pni pclmulqdq dtes64 monitor ds_cpl vmx est tm2 ssse3 sdbg fma cx16 xtpr pdcm pcid sse4_1 sse4_2 x2apic movbe popcnt tsc_deadline_timer aes xsave avx f16c rdrand lahf_lm abm 3dnowprefetch cpuid_fault invpcid_single pti ssbd ibrs ibpb stibp tpr_shadow vnmi flexpriority ept vpid fsgsbase tsc_adjust bmi1 avx2 smep bmi2 erms invpcid mpx rdseed adx smap clflushopt intel_pt xsaveopt xsavec xgetbv1 xsaves dtherm ida arat pln pts hwp hwp_notify hwp_act_window hwp_epp md_clear flush_l1d
```