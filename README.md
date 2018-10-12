# Medianheap

MedianHeap class solution has some perfomance issue because of this line ```$this->numbers[] = $number;``` , If you are push new element in array then it will consider as add/update/copy/allocation etc. So if you are create big array then it will trying to allocate more memory to references.

Sort function is implementation of Quickshort. So sort function is optimize library code. So it will perfom better than second one.

