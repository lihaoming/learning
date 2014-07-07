
def find_largest_square(l_all, i):
	base, width, length = l_all[i],1, len(l_all)
	left_index, right_index = i, i + 1
	while left_index > 0  and l_all[left_index - 1] > l_all[i]:
		width = width + 1
		left_index = left_index - 1
	while right_index < length and l_all[right_index] > l_all[i]:
		width = width + 1
		right_index = right_index + 1
	s = base * width
	print('%d: %d, %d: %d' % (i+1, left_index, right_index, s))
	return s

list_all = [1,2,3,0,20,3,10,5,6,9]
largest_square = 0
leng_list = len(list_all)
if leng_list == 0:
	print 0
if leng_list == 1:
	print list_all[0]
for i in xrange(leng_list):	
	sub_square = find_largest_square(list_all, i)
	if sub_square > largest_square:
		largest_square = sub_square
	print(largest_square)