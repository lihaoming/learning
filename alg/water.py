
def filter_weak_wall(l_wall):
	list_to_del,new_wall = [],[]
	if len(l_wall) > 3:
		return l_wall
	for i,e in enumerate(l_wall):
		if i == 0 or i+1 == len(l_wall):
			new_wall.append(e)
		elif l_wall[i-1] < e or l_wall[i+1] < e:
			new_wall.append(e)
	return new_wall

def calc_vol(l_all, wall_a, wall_b):
	vol = 0
	sublist = l_all[wall_a+1 : wall_b]###
	lower_wall = l_all[wall_a]
	if lower_wall > l_all[wall_b]:
		lower_wall = l_all[wall_b]
	for e in sublist:
		vol += lower_wall - e
	print(vol)
	return vol


def pull_water(l_all, l_wall):
	num_of_wall = len(l_wall)
	volume = 0
	if num_of_wall < 3:
		return volume # No water stored
	for i,e in enumerate(l_wall[:-1]):
		wall_a,wall_b = e,l_wall[i+1]
		print('%d, %d' % (l_all[wall_a], l_all[wall_b] ))
		volume += calc_vol(l_all, wall_a, wall_b)###
	return volume
def first_find_wall(list_all):
	list_wall = []
	last_index = len(list_all)-1
	for i,e in enumerate(list_all):
		if i == 0:
			if e > list_all[i+1]:
				list_wall.append(i)
		elif i == last_index:
			if e > list_all[i-1]:
				list_wall.append(i)
				#print(i)
		elif 0 < i < last_index:
			if list_all[i-1] < e and e > list_all[i+1]:
				list_wall.append(i)
	return list_wall

list_all = [1,2,3,0,20,3,10,5,6,9]
list_wall = first_find_wall(list_all)
list_wall = filter_weak_wall(list_wall)
print(pull_water(list_all,list_wall))
